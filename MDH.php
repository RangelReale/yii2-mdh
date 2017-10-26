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
    
    public $converters;
    public $datatypeAlias;
    
    public function init()
    {
        $this->mdh = new Yii2MDH();
        if (!empty($this->converters))
        {
            foreach ($this->converters as $cname => $cvalue)
            {
                $this->mdh->setConverter($cname, \Yii::createObject($cvalue, [$this->mdh]));
            }
        }
        if (!empty($this->datatypeAlias))
        {
            foreach ($this->datatypeAlias as $cname => $cvalue)
            {
                $this->mdh->addDataTypeAlias($cname, $cvalue);
            }
        }
        $this->mdh->setDataConversionMessage(new DataConversionMessage());
    }
    
    public function __get($name)
    {
        return $this->mdh->$name;
    }

    /*
    public function __set($name, $value)
    {
        $this->mdh->$name = $value;
    }
     */

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