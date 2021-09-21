<?php
/**
 * 兼容样式
 */
namespace adminlte;

use yii\base\Exception;
use yii\web\AssetBundle;
use yii\web\View;

class CompatibleAsset extends AssetBundle
{
    public $sourcePath = '@adminlte/compatibles';

    public $css = [
        ['select2/css/select2-addl.css', 'position' => View::POS_END],
    ];
}