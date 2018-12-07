<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class FundConsolidateComponent extends Component {
    
    public $components = ['FundLookup'];
    
    public function getFundTotals($fund) {
        
        $crntFundPrice = $this->FundLookup->getFundPrice($fund->fund_index);
        //Test showing I got the current price!
        //return $crntFundPrice;
    }
}

?>