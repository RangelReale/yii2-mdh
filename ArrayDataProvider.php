<?php

namespace RangelReale\yii2mdh;

use RangelReale\mdh\MultiConversion;

class ArrayDataProvider extends \yii\data\ArrayDataProvider
{
    public $mdh;
    
    public $converterFrom;
    public $converterTo;
    public $convert = [];
    public $convertThrow = true;
    
    protected function prepareModels()
    {
        $models = parent::prepareModels();
        if (is_null($this->converterFrom) && $is_null($this->converterTo))
            return $models;
        
        $c = new MultiConversion($this->convert, $this->convertThrow);
        return $this->getMdh()->convertMultiList($this->converterFrom, $this->converterTo, $c, $models)->result;
    }
    
    private function getMdh()
    {
        if (isset($this->mdh))
            return $this->mdh;
        return \Yii::$app->mdh;
    }
}