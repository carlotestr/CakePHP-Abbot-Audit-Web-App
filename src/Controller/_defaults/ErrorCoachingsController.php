<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ErrorCoachings Controller
 *
 * @property \App\Model\Table\ErrorCoachingsTable $ErrorCoachings
 *
 * @method \App\Model\Entity\ErrorCoaching[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ErrorCoachingsController extends AppController
{
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
        if ($this->request->is('post')) {
            $errorCoaching = $this->ErrorCoachings->patchEntity($errorCoaching, $this->request->getData());
            if ($this->ErrorCoachings->save($errorCoaching)) {
                $this->Flash->success(__('The {0} has been saved.', 'Error Coaching'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Error Coaching'));
        }
        $users = $this->ErrorCoachings->Users->find('list', ['limit' => 200]);
        $this->set(compact('errorCoaching', 'users'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $errorCoaching = $this->ErrorCoachings->patchEntity($errorCoaching, $this->request->getData());
            if ($this->ErrorCoachings->save($errorCoaching)) {
                $this->Flash->success(__('The {0} has been saved.', 'Error Coaching'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Error Coaching'));
        }
        $users = $this->ErrorCoachings->Users->find('list', ['limit' => 200]);
        $this->set(compact('errorCoaching', 'users'));
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
