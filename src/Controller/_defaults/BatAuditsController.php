<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BatAudits Controller
 *
 * @property \App\Model\Table\BatAuditsTable $BatAudits
 *
 * @method \App\Model\Entity\BatAudit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BatAuditsController extends AppController
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
        $batAudits = $this->paginate($this->BatAudits);

        $this->set(compact('batAudits'));
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

        $this->set('batAudit', $batAudit);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $batAudit = $this->BatAudits->newEntity();
        if ($this->request->is('post')) {
            $batAudit = $this->BatAudits->patchEntity($batAudit, $this->request->getData());
            if ($this->BatAudits->save($batAudit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Bat Audit'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Bat Audit'));
        }
        $users = $this->BatAudits->Users->find('list', ['limit' => 200]);
        $this->set(compact('batAudit', 'users'));
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
        $batAudit = $this->BatAudits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $batAudit = $this->BatAudits->patchEntity($batAudit, $this->request->getData());
            if ($this->BatAudits->save($batAudit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Bat Audit'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Bat Audit'));
        }
        $users = $this->BatAudits->Users->find('list', ['limit' => 200]);
        $this->set(compact('batAudit', 'users'));
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
}
