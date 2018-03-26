<?php

namespace RangelReale\yii2mdh;

use RangelReale\mdh\BaseMDH;

class MDH extends \yii\base\BaseObject
{
    /**
     * @var BaseMDH
     */
    private $_mdh;
    
    public function __get($name)
    {
        return $this->getMdh()->$name;
    }

    public function __set($name, $value)
    {
        $this->getMdh()->$name = $value;
    }

    public function __call($name, $args)
    {
        return call_user_func_array([$this->getMdh(), $name], $args);
    }
    
    public function getMdh()
    {
        if (!isset($this->_mdh)) {
            $this->_mdh = new Yii2MDH();
        }
        return $this->_mdh;
    }
}

class Yii2MDH extends BaseMDH
{
    public function getLocale()
    {
        return \Yii::$app->language;
    }
    
    public function setLocale($value) 
    {
        throw new \yii\base\NotSupportedException('Locale setting not supported');
    }
}