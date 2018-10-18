<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TransType Controller
 *
 * @property \App\Model\Table\TransTypeTable $TransType
 *
 * @method \App\Model\Entity\TransType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransTypeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $transType = $this->paginate($this->TransType);

        $this->set(compact('transType'));
    }

    /**
     * View method
     *
     * @param string|null $id Trans Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transType = $this->TransType->get($id, [
            'contain' => []
        ]);

        $this->set('transType', $transType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transType = $this->TransType->newEntity();
        if ($this->request->is('post')) {
            $transType = $this->TransType->patchEntity($transType, $this->request->getData());
            if ($this->TransType->save($transType)) {
                $this->Flash->success(__('The trans type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trans type could not be saved. Please, try again.'));
        }
        $this->set(compact('transType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trans Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transType = $this->TransType->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transType = $this->TransType->patchEntity($transType, $this->request->getData());
            if ($this->TransType->save($transType)) {
                $this->Flash->success(__('The trans type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trans type could not be saved. Please, try again.'));
        }
        $this->set(compact('transType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trans Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transType = $this->TransType->get($id);
        if ($this->TransType->delete($transType)) {
            $this->Flash->success(__('The trans type has been deleted.'));
        } else {
            $this->Flash->error(__('The trans type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
