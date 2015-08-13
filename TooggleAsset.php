<?php

namespace lo\widgets;

use yii\web\AssetBundle;

class ToggleAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap-toggle';
	
    public $js = [
        'js/bootstrap-toggle.min.js'
    ];
	
	public $css = [
        'css/bootstrap-toggle.min.css'
    ];
	
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}
