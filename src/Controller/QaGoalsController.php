<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Cake\Event\Event;
use Cake\Routing\Router;
/**
 * QaGoals Controller
 *
 * @property \App\Model\Table\QaGoalsTable $QaGoals
 *
 * @method \App\Model\Entity\QaGoal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QaGoalsController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $login = $this->Auth->user();

        if (!is_null($login)) {

          $administrativePositions = ['QA Analysts','Administrator'];
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
        $qaGoals = $this->paginate($this->QaGoals);

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
        $this->set(compact('qaGoals','merged_audit_results'));
    }

    /**
     * View method
     *
     * @param string|null $id Qa Goal id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $qaGoal = $this->QaGoals->get($id, [
            'contain' => ['Users']
        ]);
        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set('qaGoal', $qaGoal);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $qaGoal = $this->QaGoals->newEntity();
        if ($this->request->is('post')) {
            $qaGoal = $this->QaGoals->patchEntity($qaGoal, $this->request->getData());
            if ($this->QaGoals->save($qaGoal)) {
                $this->Flash->success(__('The {0} has been saved.', 'Qa Goal'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Qa Goal'));
        }
        $login = $this->Auth->user();

        // $listOptions = array();

        // foreach (range(0,100) as $number) {
        //     array_push($listOptions, $number);
        // }

        $goalProgressKeys = array('0%','25%','50%','75%','100%');
        $goalProgressValues = array('0%','25%','50%','75%','100%');

        $listOptions = array_combine($goalProgressKeys, $goalProgressValues);
        
        $this->set('login',$login);
               
        $users = $this->QaGoals->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        // $users = $this->QaGoals->Users->find('list', ['limit' => 200]);
        $this->set(compact('qaGoal', 'users','listOptions'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Qa Goal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $qaGoal = $this->QaGoals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $qaGoal = $this->QaGoals->patchEntity($qaGoal, $this->request->getData());
            if ($this->QaGoals->save($qaGoal)) {
                $this->Flash->success(__('The {0} has been saved.', 'Qa Goal'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Qa Goal'));
        }
        $users =         $users = $this->QaGoals->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $login = $this->Auth->user();

        // $listOptions = array();

        // foreach (range(0,100) as $number) {
        //     array_push($listOptions, $number);
        // }

        $goalProgressKeys = array('0%','25%','50%','75%','100%');
        $goalProgressValues = array('0%','25%','50%','75%','100%');

        $listOptions = array_combine($goalProgressKeys, $goalProgressValues);
        
        $this->set('login',$login);
        $this->set(compact('qaGoal', 'users','listOptions'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Qa Goal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $qaGoal = $this->QaGoals->get($id);
        if ($this->QaGoals->delete($qaGoal)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Qa Goal'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Qa Goal'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
