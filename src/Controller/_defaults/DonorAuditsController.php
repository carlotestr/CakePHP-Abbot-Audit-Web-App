<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DonorAudits Controller
 *
 * @property \App\Model\Table\DonorAuditsTable $DonorAudits
 *
 * @method \App\Model\Entity\DonorAudit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DonorAuditsController extends AppController
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
        $donorAudits = $this->paginate($this->DonorAudits);

        $this->set(compact('donorAudits'));
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
            if ($this->DonorAudits->save($donorAudit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Donor Audit'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Donor Audit'));
        }
        $users = $this->DonorAudits->Users->find('list', ['limit' => 200]);
        $this->set(compact('donorAudit', 'users'));
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
            if ($this->DonorAudits->save($donorAudit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Donor Audit'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Donor Audit'));
        }
        $users = $this->DonorAudits->Users->find('list', ['limit' => 200]);
        $this->set(compact('donorAudit', 'users'));
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
}
