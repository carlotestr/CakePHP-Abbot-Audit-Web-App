<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Cake\Event\Event;
use Cake\Routing\Router;
/**
 * BatAudits Controller
 *
 * @property \App\Model\Table\BatAuditsTable $BatAudits
 *
 * @method \App\Model\Entity\BatAudit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BatAuditsController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $login = $this->Auth->user();

        if (!is_null($login)) {

          $authorizedPositions = ['QA Analysts','QA Manager', 'Administrator','Agents/Employees','Supervisor/MSE','Operations Manager' ];
          $authorizedDefaultAccessibility = ['generateReport'];

          $administrativePositions = ['QA Analysts','QA Manager', 'Administrator'];
          $administrativeDefaultAccessibility = ['index','view','add','edit','delete','generateReport'];


          if ( ( in_array($login['emp_position'], $authorizedPositions)  && in_array($this->request->action, $authorizedDefaultAccessibility) ) || ( in_array($login['emp_position'], $administrativePositions)  && in_array($this->request->action, $administrativeDefaultAccessibility) ) ) {
           
           if ($login['emp_team'] === 'Breathe Alcohol') {
               
               return true;
           } else {

            $this->Flash->error(__('Sorry! User account team should be Breathe Alcohol.'));

             return $this->redirect( Router::url( $this->referer(), true ) );
           }
           

          } else {

            $this->Flash->error(__('Sorry!, User account restricted access.'));

            return $this->redirect(['action' => 'profile']);
          }
         
        } 

        // if (in_array($login['emp_position'], $authorizedPositions)) {
        //    return true;
        // } else {

        //   $this->redirect( Router::url( $this->referer(), true ) );
        //   $this->Flash->error(__('Sorry! Page restricted.'));

        // }

  }



    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $batAudits = $this->paginate($this->BatAudits);

        $login = $this->Auth->user();

        /*LEADER BOARD DATA: FETCH DATA FROM DONOR AUDIT AND BAT AUDIT**/
        $donor_audits = TableRegistry::get('donor_audits');
        $donor_audits = $donor_audits->find()
            ->contain(['Users'])
            ->limit(5)
            ->order(['overall_score' => 'DESC'])->toArray();


        $bat_audits = TableRegistry::get('bat_audits');
        $bat_audits = $bat_audits->find()
            ->contain(['Users'])
            ->limit(5)
            ->order(['overall_score' => 'DESC'])->toArray();

        $auditResults = array();

        /**MERGE RESULT SET OF BAT_AUDITS AND DONOR_AUDITS **/
        $merged_audit_results = Hash::merge($auditResults, $bat_audits, $donor_audits);
        $merged_audit_results = Hash::sort($merged_audit_results, '{n}.overall_score', 'desc');
        
        $this->set('login',$login);
        $this->set(compact('batAudits','merged_audit_results'));
    }

    /**
     * View method
     *
     * @param string|null $id Bat Audit id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $batAudit = $this->BatAudits->get($id, [
            'contain' => ['Users']
        ]);
        $login = $this->Auth->user();
        
        // $user = $this->BatAudits->Users->find('all',[ 'conditions' => array('Users.id' => h($batAudit->auditor))]);
       $employee = $this->BatAudits->Users->get($batAudit["emp_id"] );
       $auditor = $this->BatAudits->Users->get($batAudit["auditor"] );
        // $empDetail=$this->Users->get($batAudit["emp_id"]);
        // $this->set('empDetail',$empDetail);

        $this->set('login',$login);
        $this->set('batAudit', $batAudit);
        $this->set('user', $employee);

        $this->set('auditor', $auditor);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agentNameOptions = $this->BatAudits->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $auditorNameOptions = $this->BatAudits->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $batAudit = $this->BatAudits->newEntity();
        if ($this->request->is('post')) {
            $batAudit = $this->BatAudits->patchEntity($batAudit, $this->request->getData());
            
            /*OVERALL SCORE FORMULA:
                overallScore = (fatal_score + non_fatal_score) - 1
            **/

            $batAudit["overall_score"] = $this->request->getData('fatal_score') + $this->request->getData('nonfatal_score');
            $batAudit["overall_score"] = $batAudit["overall_score"] - 1;
            $batAudit["audit_count"] = 1;
            $batAudit["nonfatal_score"] = $this->request->getData('nonfatal_testnum') + $this->request->getData('nonfatal_doc') + $this->request->getData('nonfatal_donorinfo');

            //GET CURRENT USER LOGGED IN ID AND SET AS AUDITOR
            $batAudit["auditor"] = $this->Auth->session->read($this->Auth->sessionKey . '.id');

            if ($this->BatAudits->save($batAudit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Bat Audit'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Bat Audit'));
        }

        $users = $this->loadModel('Users');
        $users = $users->find('all')
                    ->where(['emp_team' => 'Breathe Alcohol']);
        $users = $users->find('list', ['limit' => 200]);

        $login = $this->Auth->user();

        $tenureshipOptions = ['Tenured','New Hire'];
        $weekOptions = ['Week 1','Week 2','Week 3','Week 4'];
        $booleanOptions = ['Yes','No'];
        $passfailOptions = ['Pass','Fail'];
        $nonfatal_testnum_Options = ['0','25','50'];
        $nonfatal_doc_Options = ['0','20'];
        $nonfatal_donorinfo = ['0','10','20','30'];
        $fatal_score_Options = ['0','100'];
        
        $this->set('login',$login);
        $this->set(compact('login','batAudit', 'users','tenureshipOptions','weekOptions','booleanOptions','nonfatal_testnum_Options','nonfatal_doc_Options','nonfatal_donorinfo','passfailOptions','fatal_score_Options','agentNameOptions','auditorNameOptions'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Bat Audit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agentNameOptions = $this->BatAudits->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $auditorNameOptions = $this->BatAudits->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $batAudit = $this->BatAudits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $batAudit = $this->BatAudits->patchEntity($batAudit, $this->request->getData());

            /*OVERALL SCORE FORMULA:
                overallScore = (fatal_score + non_fatal_score) - 1
            **/
                
            $batAudit["overall_score"] = $this->request->getData('fatal_score') + $this->request->getData('nonfatal_score');
            $batAudit["overall_score"] = $batAudit["overall_score"] - 1;

            $batAudit["audit_count"] = 1;
            $batAudit["nonfatal_score"] = $this->request->getData('nonfatal_testnum') + $this->request->getData('nonfatal_doc') + $this->request->getData('nonfatal_donorinfo');

            //GET CURRENT USER LOGGED IN ID AND SET AS AUDITOR
            $batAudit["auditor"] = $this->Auth->session->read($this->Auth->sessionKey . '.id');


            if ($this->BatAudits->save($batAudit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Bat Audit'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Bat Audit'));
        }

        $users = $this->loadModel('Users');
        $users = $users->find('all')
                    ->where(['emp_team' => 'Breathe Alcohol']);
        $users = $users->find('list', ['limit' => 200]);

        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set(compact('batAudit', 'users','agentNameOptions','auditorNameOptions'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Bat Audit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $batAudit = $this->BatAudits->get($id);
        if ($this->BatAudits->delete($batAudit)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Bat Audit'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Bat Audit'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function generateReport() {

        $login = $this->Auth->user();
        $batAudit = $this->BatAudits->newEntity();
        $users = $this->BatAudits->Users->find('list', ['limit' => 200]);
        $weekOptions = ['Week 1','Week 2','Week 3','Week 4'];
        $booleanOptions = ['Yes','No'];
         /*MONTH IN PLAIN ARRAY**/
        $monthKeys = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");
        $monthValues = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");

        $monthOptions = array_combine($monthKeys, $monthValues);

        if ($this->request->is('post')) {

            $team = $this->request->getData('team');
            $month = $this->request->getData('month');
            $agent = $this->request->getData('agent');
            $week = $this->request->getData('week');
            $rft = $this->request->getData('rft');

        }

        $this->set('login',$login);
        $this->set(compact('batAudit', 'login','users','weekOptions','booleanOptions','monthOptions'));
    }
}
