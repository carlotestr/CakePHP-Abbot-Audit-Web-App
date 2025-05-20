<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Cake\Collection\Collection;
use Cake\Event\Event;
use Cake\Routing\Router;
/**
 * QaCoachings Controller
 *
 * @property \App\Model\Table\QaCoachingsTable $QaCoachings
 *
 * @method \App\Model\Entity\QaCoaching[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QaCoachingsController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $login = $this->Auth->user();

        if (!is_null($login)) {

          $administrativePositions = ['QA Manager','Administrator'];
          $administrativeDefaultAccessibility = ['index','view','add','edit','delete'];

          if ( in_array($login['emp_position'], $administrativePositions)  && in_array($this->request->action, $administrativeDefaultAccessibility) ) {
           
           return true;

          } else {

            $this->Flash->error(__('Sorry!, User account restricted access.'));

             return $this->redirect( Router::url( $this->referer(), true ) );
          }
         
        } 
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
        $qaCoachings = $this->paginate($this->QaCoachings);
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
        $this->set(compact('qaCoachings','donor_audits','bat_audits','merged_audit_results'));
    }

    /**
     * View method
     *
     * @param string|null $id Qa Coaching id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $qaCoaching = $this->QaCoachings->get($id, [
            'contain' => ['Users']
        ]);
        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set('qaCoaching', $qaCoaching);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $qaCoaching = $this->QaCoachings->newEntity();
        if ($this->request->is('post')) {
            $qaCoaching = $this->QaCoachings->patchEntity($qaCoaching, $this->request->getData());
            if ($this->QaCoachings->save($qaCoaching)) {
                $this->Flash->success(__('The {0} has been saved.', 'Qa Coaching'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Qa Coaching'));
        }

        $users = $this->QaCoachings->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $login = $this->Auth->user();

        /*MONTH USING INDEX**/
        // $monthOptions = array_reduce(range(1,12),function($rslt,$m){ $rslt[$m] = date('F',mktime(0,0,0,$m,10)); return $rslt; });
        /*MONTH IN PLAIN ARRAY**/
        $monthKeys = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");
        $monthValues = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");

        $monthOptions = array_combine($monthKeys, $monthValues);
        
        $this->set('login',$login);
        $this->set(compact('qaCoaching', 'users','monthOptions'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Qa Coaching id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $qaCoaching = $this->QaCoachings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $qaCoaching = $this->QaCoachings->patchEntity($qaCoaching, $this->request->getData());
            if ($this->QaCoachings->save($qaCoaching)) {
                $this->Flash->success(__('The {0} has been saved.', 'Qa Coaching'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Qa Coaching'));
        }

        $monthKeys = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");
        $monthValues = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");

        $monthOptions = array_combine($monthKeys, $monthValues);
        
        $users = $this->QaCoachings->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set(compact('qaCoaching', 'users','monthOptions'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Qa Coaching id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $qaCoaching = $this->QaCoachings->get($id);
        if ($this->QaCoachings->delete($qaCoaching)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Qa Coaching'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Qa Coaching'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
