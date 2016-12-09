<?php

namespace RangelReale\yii2mdh;

use yii\base\Object;
use RangelReale\mdh\BaseMDH;

class MDH extends Object
{
    /**
     * @var BaseMDH
     */
    public $mdh;
    
    public function init()
    {
        $this->mdh = new Yii2MDH();
        $this->mdh->setDataConversionMessage(new DataConversionMessage());
    }
    
    public function __get($name)
    {
        return $this->mdh->$name;
    }
    
    public function __call($name, $args)
    {
        return call_user_func_array([$this->mdh, $name], $args);
    }
}

class Yii2MDH extends BaseMDH
{
    public function getLocale()
    {
        return \Yii::$app->language;
    }
}