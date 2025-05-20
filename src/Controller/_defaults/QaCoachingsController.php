<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QaCoachings Controller
 *
 * @property \App\Model\Table\QaCoachingsTable $QaCoachings
 *
 * @method \App\Model\Entity\QaCoaching[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QaCoachingsController extends AppController
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
        $qaCoachings = $this->paginate($this->QaCoachings);

        $this->set(compact('qaCoachings'));
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
        $users = $this->QaCoachings->Users->find('list', ['limit' => 200]);
        $this->set(compact('qaCoaching', 'users'));
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
        $users = $this->QaCoachings->Users->find('list', ['limit' => 200]);
        $this->set(compact('qaCoaching', 'users'));
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
