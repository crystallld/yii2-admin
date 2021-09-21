<?php
namespace adminlte;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * FontAwesome AssetBundle
 * Ionicons AssetBundle
 * Select2 addl compatible CSS
 */
class BowerAsset extends AssetBundle
{
    public $sourcePath = '@adminlte/bower_components';

    public $css = [
        'font-awesome/css/font-awesome.css',
        'Ionicons/css/ionicons.min.css',
    ];

    public $js = [
        'auto-line-number/js/auto-line-number.js',
    ];
}