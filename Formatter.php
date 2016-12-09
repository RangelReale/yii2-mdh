<?php

namespace RangelReale\yii2mdh;

/**
 * Replacement Yii2 Formatter that uses MDH
 */
class Formatter extends \yii\i18n\Formatter
{
    /**
     * @var \RangelReale\mdh\BaseMDH
     */
    public $mdh;
    
    public $converterFrom = null;
    public $converter = 'user';
    
    public function asRaw($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'raw', $value);
    }
    
    public function asText($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'text', $value);
    }
    
    public function asBoolean($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'boolean', $value);
    }
    
    public function asDate($value, $format = null)
    {
        if ($format === null) {
            $format = $this->dateFormat;
        }
        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'date', $value);
    }
    
    public function asTime($value, $format = null)
    {
        if ($format === null) {
            $format = $this->timeFormat;
        }
        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'time', $value);
    }
    
    public function asDatetime($value, $format = null)
    {
        if ($format === null) {
            $format = $this->datetimeFormat;
        }
        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'datetime', $value);
    }

    public function asInteger($value, $options = [], $textOptions = [])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'integer', $value);
    }
    
    public function asDecimal($value, $decimals = null, $options = [], $textOptions = [])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'decimal', $value, ['decimals'=>$decimals]);
    }    
    
    public function asCurrency($value, $currency = null, $options = [], $textOptions = [])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'currency', $value);
    }    
    
    public function asShortSize($value, $decimals = null, $options = [], $textOptions = [])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'bytes', $value);
    }    
    
    public function asTimePeriod($value, $format = null)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->getMdh()->convert($this->converterFrom, $this->converter, 'timeperiod', $value);
    }    
    
     /**
     * @return \RangelReale\mdh\BaseMDH
     */
    private function getMdh()
    {
        if (isset($this->mdh))
            return $this->mdh;
        return \Yii::$app->mdh;
    }
}