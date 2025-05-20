<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
/**
 * ErrorCoachings Controller
 *
 * @property \App\Model\Table\ErrorCoachingsTable $ErrorCoachings
 *
 * @method \App\Model\Entity\ErrorCoaching[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ErrorCoachingsController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $login = $this->Auth->user();

        if (!is_null($login)) {

          $administrativePositions = ['Supervisor/MSE','Administrator'];
          $administrativeDefaultAccessibility = ['index','view','add','edit','delete'];

          if ( in_array($login['emp_position'], $administrativePositions)  && in_array($this->request->action, $administrativeDefaultAccessibility) ) {
           
           return true;

          } else {

            $this->Flash->error(__('Sorry!, User account restricted access. User account with Supervisor/MSE only allowed to perform error coaching.'));

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
        $errorCoachings = $this->paginate($this->ErrorCoachings);
        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set(compact('errorCoachings'));
    }

    /**
     * View method
     *
     * @param string|null $id Error Coaching id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $errorCoaching = $this->ErrorCoachings->get($id, [
            'contain' => ['Users']
        ]);
        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set('errorCoaching', $errorCoaching);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $errorCoaching = $this->ErrorCoachings->newEntity();

        $weekValuesOptions = ['Week 1','Week 2','Week 3','Week 4'];
        $weekKeysOptions = ['Week 1','Week 2','Week 3','Week 4'];
        $weekOptions = array_combine($weekKeysOptions, $weekValuesOptions);

        if ($this->request->is('post')) {
            $errorCoaching = $this->ErrorCoachings->patchEntity($errorCoaching, $this->request->getData());

            $audit_collectiondate = date_create($this->request->getData("audit_collectiondate"));
            $audit_collectiondate = date_format($audit_collectiondate,"Y-m-d");
            $errorCoaching["audit_collectiondate"] = $audit_collectiondate;

            $audit_processdate = date_create($this->request->getData("audit_processdate"));
            $audit_processdate = date_format($audit_processdate,"Y-m-d");
            $errorCoaching["audit_processdate "] = $audit_processdate;

            $audit_date  = date_create($this->request->getData("audit_date"));
            $audit_date  = date_format($audit_date,"Y-m-d");
            $errorCoaching["audit_date "] = $audit_date;            

            if ($this->ErrorCoachings->save($errorCoaching)) {
                $this->Flash->success(__('The {0} has been saved.', 'Error Coaching'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Error Coaching'));
        }
  
        $users = $this->ErrorCoachings->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set(compact('errorCoaching', 'users','weekOptions'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Error Coaching id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $errorCoaching = $this->ErrorCoachings->get($id, [
            'contain' => []
        ]);

        $weekValuesOptions = ['Week 1','Week 2','Week 3','Week 4'];
        $weekKeysOptions = ['Week 1','Week 2','Week 3','Week 4'];
        $weekOptions = array_combine($weekKeysOptions, $weekValuesOptions);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $errorCoaching = $this->ErrorCoachings->patchEntity($errorCoaching, $this->request->getData());

            // $audit_collectiondate = date_create($this->request->getData("audit_collectiondate"));
            // $audit_collectiondate = date_format($audit_collectiondate,"m/d/Y");
            // $errorCoaching["audit_collectiondate"] = $audit_collectiondate;

            // $audit_processdate = date_create($this->request->getData("audit_processdate"));
            // $audit_processdate = date_format($audit_processdate,"m/d/Y");
            // $errorCoaching["audit_processdate "] = $audit_processdate;

            // $audit_date  = date_create($this->request->getData("audit_date"));
            // $audit_date  = date_format($audit_date,"m/d/Y");
            // $errorCoaching["audit_date "] = $audit_date;    

            if ($this->ErrorCoachings->save($errorCoaching)) {
                $this->Flash->success(__('The {0} has been saved.', 'Error Coaching'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Error Coaching'));
        }
        $users = $this->ErrorCoachings->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set(compact('errorCoaching', 'users','weekOptions'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Error Coaching id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $errorCoaching = $this->ErrorCoachings->get($id);
        if ($this->ErrorCoachings->delete($errorCoaching)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Error Coaching'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Error Coaching'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
