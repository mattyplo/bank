<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class FundConsolidateComponent extends Component {
    
    public $components = ['FundLookup'];
    
    public function getFundTotals($fund) {
        
        $crntFundPrice = $this->FundLookup->getFundPrice($fund->fund_index);
        //Test showing I got the current price!
        //return $crntFundPrice;
        $fundController = $this->_registry->getController();
        $fundController->loadModel('Transactions');
        $query = $fundController->Transactions->find('all')->where(['fund_id' => $fund->fund_id]);
        $sum = $query->select(['summ' =>$query->func()->sum('trans_num_shares')]);
        
        return $sum->first();
    }
}

?>