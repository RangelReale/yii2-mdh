<?php

namespace RangelReale\yii2mdh;

/**
 * Replacement Yii2 Formatter that uses MDH
 */
abstract class Formatter extends \yii\i18n\Formatter
{
    public $converter = 'user';
    
    /**
     * @return \RangelReale\mdh\BaseMDH Description
     */
    abstract public function mdh();
    
    public function asRaw($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->mdh()->format($this->converter, 'raw', $value);
    }
    
    public function asText($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->mdh()->format($this->converter, 'text', $value);
    }
    
    public function asBoolean($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        return $this->mdh()->format($this->converter, 'boolean', $value);
    }
    
    public function asDate($value, $format = null)
    {
        if ($format === null) {
            $format = $this->dateFormat;
        }
        return $this->mdh()->format($this->converter, 'date', $value);
    }
    
    public function asTime($value, $format = null)
    {
        if ($format === null) {
            $format = $this->timeFormat;
        }
        return $this->mdh()->format($this->converter, 'time', $value);
    }
    
    public function asDatetime($value, $format = null)
    {
        if ($format === null) {
            $format = $this->datetimeFormat;
        }
        return $this->mdh()->format($this->converter, 'datetime', $value);
    }

    public function asInteger($value, $options = [], $textOptions = [])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->mdh()->format($this->converter, 'integer', $value);
    }
    
    public function asDecimal($value, $decimals = null, $options = [], $textOptions = [])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->mdh()->format($this->converter, 'decimal', $value, ['decimals'=>$decimals]);
    }    
    
    public function asCurrency($value, $currency = null, $options = [], $textOptions = [])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->mdh()->format($this->converter, 'currency', $value);
    }    
    
    public function asShortSize($value, $decimals = null, $options = [], $textOptions = [])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->mdh()->format($this->converter, 'bytes', $value);
    }    
    
    public function asTimePeriod($value, $format = null)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->mdh()->format($this->converter, 'timeperiod', $value);
    }    
}