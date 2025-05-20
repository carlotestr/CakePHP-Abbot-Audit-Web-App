<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QaGoals Controller
 *
 * @property \App\Model\Table\QaGoalsTable $QaGoals
 *
 * @method \App\Model\Entity\QaGoal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QaGoalsController extends AppController
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
        $qaGoals = $this->paginate($this->QaGoals);

        $this->set(compact('qaGoals'));
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
        $users = $this->QaGoals->Users->find('list', ['limit' => 200]);
        $this->set(compact('qaGoal', 'users'));
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
        $users = $this->QaGoals->Users->find('list', ['limit' => 200]);
        $this->set(compact('qaGoal', 'users'));
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
