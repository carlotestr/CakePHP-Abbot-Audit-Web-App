<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AgentDisputes Controller
 *
 * @property \App\Model\Table\AgentDisputesTable $AgentDisputes
 *
 * @method \App\Model\Entity\AgentDispute[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AgentDisputesController extends AppController
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
        $agentDisputes = $this->paginate($this->AgentDisputes);

        $this->set(compact('agentDisputes'));
    }

    /**
     * View method
     *
     * @param string|null $id Agent Dispute id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agentDispute = $this->AgentDisputes->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('agentDispute', $agentDispute);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agentDispute = $this->AgentDisputes->newEntity();
        if ($this->request->is('post')) {
            $agentDispute = $this->AgentDisputes->patchEntity($agentDispute, $this->request->getData());
            if ($this->AgentDisputes->save($agentDispute)) {
                $this->Flash->success(__('The {0} has been saved.', 'Agent Dispute'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Agent Dispute'));
        }
        $users = $this->AgentDisputes->Users->find('list', ['limit' => 200]);
        $this->set(compact('agentDispute', 'users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Agent Dispute id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agentDispute = $this->AgentDisputes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agentDispute = $this->AgentDisputes->patchEntity($agentDispute, $this->request->getData());
            if ($this->AgentDisputes->save($agentDispute)) {
                $this->Flash->success(__('The {0} has been saved.', 'Agent Dispute'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Agent Dispute'));
        }
        $users = $this->AgentDisputes->Users->find('list', ['limit' => 200]);
        $this->set(compact('agentDispute', 'users'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Agent Dispute id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agentDispute = $this->AgentDisputes->get($id);
        if ($this->AgentDisputes->delete($agentDispute)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Agent Dispute'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Agent Dispute'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
