<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Http\Client;
//use App\Form\LookUpFundForm;

class FundLookupComponent extends Component
{
    public function getFundName($symbol){
        $http = new Client();
        $address = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=" . $symbol . "&apikey=L1G9JSZ77QFGSV8A";
        $response = $http->get($address);
        $json = $response->json;
        $name = $json["bestMatches"][0]["2. name"];
        
        return ($name);   
    }
    
    public function getFundInfo($symbol)
    {
        $http = new Client();
        $address = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=" . $symbol . "&apikey=L1G9JSZ77QFGSV8A";
        $response = $http->get($address);
        $json = $response->json;
        return $json;
        
    }
    public function getSumShares($fund) {
        
        $fundController = $this->_registry->getController();
        $fundController->loadModel('Transactions');
        $query = $fundController->Transactions->find('all')->where(['fund_id' => $fund->fund_id]);
        $sum = $query->select(['summ' =>$query->func()->sum('trans_num_shares')]);
        $totalShares = $sum->first();
        return $totalShares['summ'];
    }
    
    public function getSumSharesByFundId($fund_id) {
        
        $fundController = $this->_registry->getController();
        $fundController->loadModel('Transactions');
        $query = $fundController->Transactions->find('all')->where(['fund_id' => $fund_id]);
        $sum = $query->select(['summ' =>$query->func()->sum('trans_num_shares')]);
        $totalShares = $sum->first();
        
        return $totalShares['summ'];
    }
    
    public function getFundPrice($symbol) {
        $http = new Client();
        $address = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=" . $symbol . "&apikey=L1G9JSZ77QFGSV8A";
        $response = $http->get($address);
        $json = $response->json;
        $name = $json['Global Quote']['05. price'];
        return $name;
    }
    
    public function getPortfolioValue($funds){
        $totalValue = 0;
        foreach ($funds as $fund) {
            $fundPrice = $fund['fund_crnt_value'];
            $numShares = $fund['num_shares'];
            $totalValue += $fundPrice * $numShares;
        }
        
        return $totalValue;
    }
}

?>