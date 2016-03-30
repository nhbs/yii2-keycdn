<?php

namespace sammaye\keycdn;

use Yii;
use yii\base\Exception;
use yii\base\Component;
use GuzzleHttp\Client;

class KeyCdn extends Component
{
    public $endpoint = 'https://api.keycdn.com';
    
    public $apiKey;
    
    private $_client;

    public function init()
    {
        $this->_client = new Client();
        return parent::init();
    }

    public function get($action, $params = [])
    {
        return $this->execute('GET', $action, $params);
    }
    
    public function post($action, $params = [])
    {
        return $this->execute('POST', $action, $params);
    }
    
    public function put($action, $params = [])
    {
        return $this->execute('PUT', $action, $params);
    }
    
    public function delete($action, $params = [])
    {
        return $this->execute('DELETE', $action, ['json' => $params]);
    }
    
    public function execute($method, $action, $params = [])
    {
        $ro = [
            'headers',
            'body',
            'json',
            'query',
            'auth'
        ];
        
        $isOptions = false;
        foreach($ro as $o){
            if(isset($params[$o])){
                $isOptions = true;
            }
        }
        
        if(!$isOptions){
            $params = ['query' => $params];
        }
        
        $res = $this
            ->_client
            ->request(
                $method, 
                $this->endpoint . '/' . $action, 
                array_merge(
                    ['auth' => [$this->apiKey, '']], 
                    $params
                )
            );
        
        // If it is not 200 Guzzle itself has exception hanndling
        //echo $res->getStatusCode();
        // "200"

        $body = json_decode($res->getBody());
        if($body){
            if($body->status === 'error'){
                throw new Exception('KeyCDN encountered an error: ' . print_r(json_encode($body), true));    
            }else{
                return true;
            }
        }else{
            throw new Exception('KeyCDN response was malformed: ' . print_r(json_encode($body), true));
        }
    }
}