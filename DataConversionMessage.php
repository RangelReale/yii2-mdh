<?php

namespace RangelReale\yii2mdh;

class DataConversionMessage extends \RangelReale\mdh\DataConversionMessage
{
    public function getAttribute($options)
    {
        if (isset($options['_attribute']) && is_string($options['_attribute'])) {
            return $options['_attribute'];
        }
        return 'Value';
    }

    public function getMessage($datatype, $parseOrFormat, $value, $options, $extra)
    {
        $attribute = $this->getAttribute($options);
        
        if ($datatype == 'integer') {
            return \Yii::t('yii', '{attribute} must be an integer.', [
                'attribute' => $attribute,
            ]);
        } elseif (substr($datatype, 0, 7)  == 'decimal') {
            return \Yii::t('yii', '{attribute} must be a number.', [
                'attribute' => $attribute,
            ]);
        } elseif ($datatype == 'date' || $datatype == 'time' || $datatype == 'datetime') {
            return \Yii::t('yii', 'The format of {attribute} is invalid.', [
                'attribute' => $attribute,
            ]);
        }
        return parent::getMessage($datatype, $parseOrFormat, $value, $options, $extra);
    }
}