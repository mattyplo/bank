<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fund Controller
 *
 * @property \App\Model\Table\FundTable $Fund
 *
 * @method \App\Model\Entity\Fund[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FundController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['User', 'FundType']
        ];
        $fund = $this->paginate($this->Fund);

        $this->set(compact('fund'));
    }

    /**
     * View method
     *
     * @param string|null $id Fund id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fund = $this->Fund->get($id, [
            'contain' => ['User', 'FundType']
        ]);

        $this->set('fund', $fund);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fund = $this->Fund->newEntity();
        if ($this->request->is('post')) {
            $fund = $this->Fund->patchEntity($fund, $this->request->getData());
            if ($this->Fund->save($fund)) {
                $this->Flash->success(__('The fund has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fund could not be saved. Please, try again.'));
        }
        $user = $this->Fund->User->find('list', ['limit' => 200]);
        $fundType = $this->Fund->FundType->find('list', ['limit' => 200]);
        $this->set(compact('fund', 'user', 'fundType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fund id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fund = $this->Fund->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fund = $this->Fund->patchEntity($fund, $this->request->getData());
            if ($this->Fund->save($fund)) {
                $this->Flash->success(__('The fund has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fund could not be saved. Please, try again.'));
        }
        $user = $this->Fund->User->find('list', ['limit' => 200]);
        $fundType = $this->Fund->FundType->find('list', ['limit' => 200]);
        $this->set(compact('fund', 'user', 'fundType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fund id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fund = $this->Fund->get($id);
        if ($this->Fund->delete($fund)) {
            $this->Flash->success(__('The fund has been deleted.'));
        } else {
            $this->Flash->error(__('The fund could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
