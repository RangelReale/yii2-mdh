# Yii2 helpers for PHP Multi Data Handler

This library contains helpers for using the [Multi Data Handler (MDH)](https://github.com/RangelReale/mdh) 
library with Yii2.

### Usage

Add the mdh application component to the *web.php* file.

```php
    'mdh' => [
        'class' => 'app\components\MDH',
    ],
```

Optionally, you can replace the formatter to the MDH one.

```php
    'formatter' => [
        'class' => 'RangelReale\yii2mdh\Formatter',
    ],
```

Then you can access MDH using the syntax:

```php
    Yii::$app->mdh->format('user', 'datetime', time());
```

#### Using in Yii2 components

Use *\RangelReale\yii2mdh\Formatter* with the 'converterFrom' property to 
automatically convert the data from any converter to the 'user'. You can
also set the target conververt using the 'converter' property.

```php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => new \RangelReale\yii2mdh\Formatter(['converterFrom'=>'db']),
    'columns' => [
        'id',
        'name',
        [
            'attribute' => 'dt_add',
            'format' => 'datetime',
        ],
        [
            'attribute' => 'dt',
            'format' => 'date',
        ],
        [
            'attribute' => 'tm',
            'format' => 'time',
        ],
        [
            'attribute' => 'is_person',
            'format' => 'boolean',
        ],
        [
            'attribute' => 'duration',
            'format' => 'timeperiod',
        ],
    ],
]);

```


#### ArrayDataProvider

This DataProvider automatically converts values between formats.

```php
$dataProvider = new \RangelReale\yii2mdh\ArrayDataProvider([
    'allModels' => $data,
    'key' => 'id',
    'converterFrom' => 'db',
    'converterTo' => 'user,
    'convert' => [
        'dt_add' => 'datetime',
        'dt' => 'date',
        'tm' => 'time',
        'is_user' => 'boolean',
        'duration' => 'timeperiod',
    ],
]);
```

### Author

Rangel Reale