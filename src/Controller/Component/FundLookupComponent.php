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
        //$results = json_encode($json); 
        $name = $json["bestMatches"][0]["2. name"];
        
        //$nameEncoded = json_encode($name);
        return ($name);
        
        
    }
    
    public function getFundInfo($symbol)
    {
        $http = new Client();
        $address = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=" . $symbol . "&apikey=L1G9JSZ77QFGSV8A";
        $response = $http->get($address);
        $json = $response->json;
        return $json;
        // Simple get
        //$response = $http->get('https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=GOOG&apikey=L1G9JSZ77QFGSV8A');
        //$json = $response->json;
        
        //$this->set('response', $json);
        
        /*
        $isPost = false;
        $response = "";
        $test = '';
        $symbol = new LookUpFundForm();
        if ($this->request->is('post')) {
            if ($symbol->execute($this->request->getData())) {
                $test = $this->request->getData();
                $index = $test["fund_index"];    
                $address = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=" . $index . "&apikey=L1G9JSZ77QFGSV8A";
                $response = $http->get($address);
                $json = $response->json;
                $isPost = true;
                
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
        return $amount1 + $amount2;
        */
    }
}

?>