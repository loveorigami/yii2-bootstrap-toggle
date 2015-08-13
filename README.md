Bootstrap Toggle widget for Yii 2
==============================

This extension provides the [Bootstrap-toggle](http://www.bootstraptoggle.com) integration for the Yii2 framework.


Installation
------------

This extension requires [Bootstrap-toggle](http://www.bootstraptoggle.com)

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist loveorigami/yii2-bootstrap-toggle "*"
```

or add

```
"loveorigami/yii2-bootstrap-toggle": "*"
```

to the require section of your composer.json.


General Usage
-------------

```php
use lo\widgets\Toggle;

Toggle::widget(
    [
        'name' => 'status', // input name. Either 'name', or 'model' and 'attribute' properties must be specified.
        'checked' => true,
        'options' => [], // checkbox options. More data html options [see here](http://www.bootstraptoggle.com)
    ]
)
```
or with active form as

```php
    <?= $form->field($model, 'status')->widget(Toggle::className(),
		[
			options =>[
				'id' => 'my-id',
			]
		]
	); ?>
```
