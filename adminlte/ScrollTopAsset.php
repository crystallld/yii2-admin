<?php
namespace adminlte;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * FontAwesome AssetBundle
 */
class ScrollTopAsset extends AssetBundle
{
    public $sourcePath = '@adminlte/bower_components/scroll-top';

    public $css = [
        'css/scroll-top.css',
    ];

    public $js = [
        'js/scroll-top.js',
    ];
}