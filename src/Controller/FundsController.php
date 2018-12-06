<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;
use App\Form\LookUpFundForm;
use App\Model\Entity\Transaction;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Funds Controller
 *
 * @property \App\Model\Table\FundsTable $Funds
 *
 * @method \App\Model\Entity\Fund[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FundsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'FundTypes']
        ];
        
        $user = $this->Auth->user('user_id'); 
       
        $query = $this->Funds->find('all')->where(['users.user_id' => $user]);
        
        //$funds = $this->paginate($this->Funds);
        $this->set('funds', $this->paginate($query));
        
        $this->set(compact('funds'));
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
        $fund = $this->Funds->get($id, [
            'contain' => ['Users', 'FundTypes']
        ]);
        
        $http = new Client();
        
       
        $fundIndex = $fund->fund_index;
        $response = $http->get('https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=' . $fundIndex . '&apikey=L1G9JSZ77QFGSV8A');
        $json = $response->json;
        
        
        $this->set('response', $json); 
        
        $this->set('fund', $fund);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function lookUp() {
        
        //$this->set('response', $json);
        $isPost = false;
        $response = "";
        $test = '';
        $symbol = new LookUpFundForm();
        if ($this->request->is('post')) {
            if ($symbol->execute($this->request->getData())) {
                $test = $this->request->getData();
                $index = $test["fund_index"];    
                //$address = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=" . $index . "&apikey=L1G9JSZ77QFGSV8A";
                //$response = $http->get($address);
                //$json = $response->json;
                $json = $this->FundLookup->getFundInfo($index);
                $name = $this->FundLookup->getFundName($index);
                $isPost = true;
                
                $this->set('name', $name);
                $this->set('response', $json);
                $this->Flash->success('We will look up the symbol for you!');
            } else {
                $this->Flash->error('There was a problem submitting your form.');
            }
        }
        
        $this->set('isPost', $isPost);
        //$this->set('response', $json);
        //$this->set('index', $index);
        //$this->set('test', $test);
        $this->set('symbol', $symbol);
    }
    
    public function add()
    {
        
        $query = $this->Funds->find('all', [
            'order' => ['Funds.fund_id' => 'DESC']
            ]);
        
        
        $fund = $this->Funds->newEntity();
        //$transaction = $this->Transactions->newEntity();
        
        $user_id = $this->Auth->user('user_id');
        
        if ($this->request->is('post')) {
            //$index = $this->request->getData('fund_index');
            
            // put the last index inserted here!
            
            $fund = $this->Funds->patchEntity($fund, $this->request->getData());
            $fund->user_id = $user_id;
            $fund->fund_name = $this->FundLookup->getFundName($fund->fund_index);
            if ($this->Funds->save($fund)) {
                // Capture the new funds id so we can create a new transaction
                
                // Capture the date
                $id = $fund->fund_id;
                $this->loadModel('Transactions');
                //$now = Time::now();
                // output the just the date, below.
                //$now->i18nFormat('yyyy-MM-dd');
                $dat = $this->request->getData();
                $year = $dat['year']['year'];
                $month = $dat['month']['month'];
                $day = $dat['day']['day'];
                $now = $year . "-" . $month . "-" . $day;
                /*
                $transactionsTable = TableRegistry::get('Transactions');
                $transaction = $transactionsTable->newEntity(); 
                $transaction->trans_date = $now;
                $transaction->trans_amt = $fund->fund_crnt_value;
                $transaction->trans_num_shares = $fund->num_shares;
                $transaction->fund_id = $id;
                $transaction->trans_type_id = 5;
                $transactionsTable->save($transaction);
                */
                
                
                $data = [
                    'trans_date' => $now,
                    'trans_amt' => $fund->fund_crnt_value,
                    'trans_num_shares' => $fund->num_shares,
                    'fund_id' => $id,
                    'trans_type_id' => 5 
                ];
                
                $entity = $this->Transactions->newEntity();
                $this->Transactions->patchEntity($entity, $data);
                if ($this->Transactions->save($entity)) {
                    $this->Flash->success(__('Your fund has been successfully added'));
                } 
                
                //$errors = $entity->getErrors();
                //$this->set('errors', $errors);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('There was an error with adding your fund!  Try again, but do something differnt.'));
        }
        $users = $this->Funds->Users->find('list', ['limit' => 200]);
        $user = $this->Auth->user('first_name'); 
        // Added in 'valueField' => 'fund_type' 
        // This got the fund_type and not fund_type_id to pop up in the view!!!
        $fundTypes = $this->Funds->FundTypes->find('list', ['limit' => 200, 'valueField' => 'fund_type']);
        
        
        $this->set(compact('fund', 'users', 'fundTypes', 'data', 'user'));
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
        $fund = $this->Funds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fund = $this->Funds->patchEntity($fund, $this->request->getData());
            if ($this->Funds->save($fund)) {
                $this->Flash->success(__('The fund has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fund could not be saved. Please, try again.'));
        }
        $users = $this->Funds->Users->find('list', ['limit' => 200]);
        $fundTypes = $this->Funds->FundTypes->find('list', ['limit' => 200, 'valueField' => 'fund_type']);
        $this->set(compact('fund', 'users', 'fundTypes'));
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
        $fund = $this->Funds->get($id);
        if ($this->Funds->delete($fund)) {
            $this->Flash->success(__('The fund has been deleted.'));
        } else {
            $this->Flash->error(__('The fund could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function addDividend() {
        $user_id = $this->Auth->user('user_id');
        $funds = $this->Funds->find('all')->where(['funds.user_id' => $user_id]);
        $this->loadModel('Transactions');
        $transaction = $this->Transactions->newEntity();
        
        if ($this->request->is(['post'])) {
            $request = $this->request->getData();
            $date = $request['year']['year'] . "-" . $request['month']['month'] . "-" . $request['day']['day'];
            $fund_id = $this->Funds->find('all')->where(['funds.user_id' => $user_id, 'funds.fund_index' => $request['fund_index']]);
            $data = [
                    'trans_date' => $date,
                    'trans_amt' => $request['trans_amt'],
                    'trans_num_shares' => $request['num_shares'],
                    'fund_id' => $fund_id,
                    'trans_type_id' => 6 
                ];
            $this->Transactions->patchEntity($transaction, $data);
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been made.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be made. Please, try again.'));
        }
       
        $this->set(compact('funds', 'transaction'));
    }
    
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if (in_array($action, ['add', 'edit', 'lookUp', 'delete', 'addDividend'])) {
            return true;
        }
    //echo $this->Funds->find('all');
    //$fund = $this->request->getParam('fund_id');
    //$user = $this->Funds->findByUserId($fund)->first();
    //$fund = $this->Funds->findByFund_id
    //$fund = $this->Funds->findByFundId
        
    //return $fund->user_id === $user['user_id'];
        
    }
       
}
