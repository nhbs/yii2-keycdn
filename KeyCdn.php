<?php

namespace sammaye\keycdn;

use Yii;
use yii\base\Component;

include Yii::getAlias('@vendor') . '/keycdn/keycdn-api/src/KeyCDN.php';

class KeyCdn extends Component
{
    public $apiKey;

    private $_client;
    
    public function getClient()
    {
        $this->_client = new KeyCDN($this->apiKey);
    }

    public function __get($k)
    {
        if(property_exists($this->getClient(), $k)){
            return $this->getClient()->$k;    
        }
        return $this->$k;
    }
    
    public function __call($name, $params)
    {
        if(!method_exists($this->getClient(), $name)){
			return parent::__call($name, $params);
		}
		return call_user_func_array(array($this->getClient(), $name), $params);
    }
}