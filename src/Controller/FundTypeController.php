<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FundType Controller
 *
 * @property \App\Model\Table\FundTypeTable $FundType
 *
 * @method \App\Model\Entity\FundType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FundTypeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $fundType = $this->paginate($this->FundType);

        $this->set(compact('fundType'));
    }

    /**
     * View method
     *
     * @param string|null $id Fund Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fundType = $this->FundType->get($id, [
            'contain' => []
        ]);

        $this->set('fundType', $fundType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fundType = $this->FundType->newEntity();
        if ($this->request->is('post')) {
            $fundType = $this->FundType->patchEntity($fundType, $this->request->getData());
            if ($this->FundType->save($fundType)) {
                $this->Flash->success(__('The fund type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fund type could not be saved. Please, try again.'));
        }
        $this->set(compact('fundType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fund Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fundType = $this->FundType->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fundType = $this->FundType->patchEntity($fundType, $this->request->getData());
            if ($this->FundType->save($fundType)) {
                $this->Flash->success(__('The fund type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fund type could not be saved. Please, try again.'));
        }
        $this->set(compact('fundType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fund Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fundType = $this->FundType->get($id);
        if ($this->FundType->delete($fundType)) {
            $this->Flash->success(__('The fund type has been deleted.'));
        } else {
            $this->Flash->error(__('The fund type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
