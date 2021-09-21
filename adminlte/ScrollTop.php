<?php
namespace adminlte;

use yii\helpers\Json;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * scroll-to-top widget to include in a website
 *
 */
class ScrollTop extends Widget
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $view = $this->getView();
        ScrollTopAsset::register($view);
    }
    /**
     * @inheritdoc
     */
    public function run()
    {
        return Html::a(
            Html::tag(
                'i',
                '',
                ['class'=>'glyphicon glyphicon-menu-up bluezed-scroll-top-circle']
            ),
            '#',
            ['id'=>'btn-top-scroller', 'class'=>'bluezed-scroll-top']
        );
    }
}