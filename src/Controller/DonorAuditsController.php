<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * DonorAudits Controller
 *
 * @property \App\Model\Table\DonorAuditsTable $DonorAudits
 *
 * @method \App\Model\Entity\DonorAudit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DonorAuditsController extends AppController
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
           
           if ($login['emp_team'] === 'Donor Contact') {
               
               return true;
               
           } else {

            $this->Flash->error(__('Sorry! User account team should be Donor Contact.'));

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
        $donorAudits = $this->paginate($this->DonorAudits);
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
        $this->set(compact('donorAudits','merged_audit_results'));
    }

    /**
     * View method
     *
     * @param string|null $id Donor Audit id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $donorAudit = $this->DonorAudits->get($id, [
            'contain' => ['Users']
        ]);
        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set('donorAudit', $donorAudit);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $donorAudit = $this->DonorAudits->newEntity();
        if ($this->request->is('post')) {
            $donorAudit = $this->DonorAudits->patchEntity($donorAudit, $this->request->getData());

            /*OVERALL SCORE FORMULA:
                overallScore = (fatal_score + non_fatal_score) - 1
            **/
                
            $donorAudit["overall_score"] = $this->request->getData('fatal_score') + $this->request->getData('nonfatal_score');
            $donorAudit["overall_score"] = $donorAudit["overall_score"] - 1;
            $donorAudit["audit_count"] = 1;

            //GET CURRENT USER LOGGED IN ID AND SET AS AUDITOR
            $donorAudit["auditor"] = $this->Auth->session->read($this->Auth->sessionKey . '.id');

            if ($this->DonorAudits->save($donorAudit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Donor Audit'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Donor Audit'));
        }

        $users = $this->loadModel('Users');
        $users = $users->find('all')
                    ->where(['emp_team' => 'Donor Contact']);
        $users = $users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);

        $login = $this->Auth->user();

        $tenureshipOptions = ['Tenured','New Hire'];
        $weekOptions = ['Week 1','Week 2','Week 3','Week 4'];
        $booleanOptions = ['Yes','No'];
        $nonfatal_greeting_Options = ['0','10'];
        $nonfatal_purpose_Options = ['0','10'];
        $nonfatal_callproper = ['0','25'];
        $nonfatal_updateacc = ['0','5'];
        $nonfatal_doc = ['0','5','10','15'];
        $nonfatal_log = ['0','30'];
        $nonfatal_handling = ['0','5'];
        $fatal_score_Options = ['0','100'];
        
        $this->set('login',$login);
        $this->set(compact('donorAudit', 'users','tenureshipOptions','weekOptions','booleanOptions','nonfatal_greeting_Options','nonfatal_purpose_Options','nonfatal_callproper','nonfatal_updateacc','nonfatal_doc','nonfatal_log','nonfatal_handling','fatal_score_Options'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Donor Audit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $donorAudit = $this->DonorAudits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $donorAudit = $this->DonorAudits->patchEntity($donorAudit, $this->request->getData());

            /*OVERALL SCORE FORMULA:
                overallScore = (fatal_score + non_fatal_score) - 1
            **/
                
            $donorAudit["overall_score"] = $this->request->getData('fatal_score') + $this->request->getData('nonfatal_score');
            $donorAudit["overall_score"] = $donorAudit["overall_score"] - 1;


            if ($this->DonorAudits->save($donorAudit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Donor Audit'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Donor Audit'));
        }
        $users = $this->loadModel('Users');
        $users = $users->find('all')
                    ->where(['emp_team' => 'Donor Contact']);
        $users = $users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);

        
        $tenureshipOptions = ['Tenured','New Hire'];
        $weekOptions = ['Week 1','Week 2','Week 3','Week 4'];
        $booleanOptions = ['Yes','No'];
        $nonfatal_greeting_Options = ['0','10'];
        $nonfatal_purpose_Options = ['0','10'];
        $nonfatal_callproper = ['0','25'];
        $nonfatal_updateacc = ['0','5'];
        $nonfatal_doc = ['0','5','10','15'];
        $nonfatal_log = ['0','30'];
        $nonfatal_handling = ['0','5'];
        $fatal_score_Options = ['0','100'];

        $this->set('login',$login);
        $this->set(compact('donorAudit', 'users','tenureshipOptions','weekOptions','booleanOptions','nonfatal_greeting_Options','nonfatal_purpose_Options','nonfatal_callproper','nonfatal_updateacc','nonfatal_doc','nonfatal_log','nonfatal_handling','fatal_score_Options'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Donor Audit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $donorAudit = $this->DonorAudits->get($id);
        if ($this->DonorAudits->delete($donorAudit)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Donor Audit'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Donor Audit'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function generateReport() {

        $login = $this->Auth->user();
        $donorAudit = $this->DonorAudits->newEntity();
        $users = $this->DonorAudits->Users->find('list', ['limit' => 200]);

        $teamKeysOptions = ['Breath Alcohol','Donor Contact'];
        $teamValuesOptions = ['Breath Alcohol','Donor Contact'];
        $teamOptions = array_combine($teamKeysOptions, $teamValuesOptions);

        $weekValuesOptions = ['Week 1','Week 2','Week 3','Week 4'];
        $weekKeysOptions = ['Week 1','Week 2','Week 3','Week 4'];
        $weekOptions = array_combine($weekKeysOptions, $weekValuesOptions);

        $booleanKeyOptions = ['Yes','No'];   
        $booleanValuesOptions = ['Yes','No'];
        $booleanOptions = array_combine($booleanKeyOptions, $booleanValuesOptions);

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

            $result = $this->DonorAudits->find('search', ['search' => $this->request->query]);
            $resultCount = count($result);

             $this->set(compact('result','resultCount'));
        }

        $this->set('login',$login);
        $this->set(compact('donorAudit', 'login','users','teamOptions','weekOptions','booleanOptions','monthOptions'));
    }
}
