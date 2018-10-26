<?php
// src/Controller/FundsController.php

namespace App\Controller;

class FundsController extends AppController
{
    public function initialize() 
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }
    
    public function index()
    {
        $funds = $this->Paginator->paginate($this->Funds->find());
        $this->set(compact('funds'));
    }
    
    public function view($fund_id = null)
    {
        $fund = $this->Funds->findByFund_id($fund_id)->firstOrFail();
        $this->set(compact('fund'));
    }
    
    public function add()
    {
        $fund = $this->Funds->newEntity();
        if ($this->request->is('post')) {
            $fund = $this->Funds->patchEntity($fund, $this->request->getData());

            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            $fund->user_id = 1;

            if ($this->Funds->save($fund)) {
                $this->Flash->success(__('Your fund has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your fund.'));
        }
        $this->set('fund', $fund);
    }
}