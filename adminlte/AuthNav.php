<?php
namespace adminlte;

use yii\base\InvalidArgumentException;
use yii\base\InvalidCallException;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;

class AuthNav extends Nav
{
    /**
     * @var
     */
    public $identity;
    /**
     * @var string 首页
     */
    public $homeUrl = 'site/index';
    /**
     * @var array
     */
    public $defaultItems = [];

    public function init()
    {
        parent::init();
    }

    public function guessNavItems()
    {
        $navs = $this->authManager->getNavesByUser($this->identity->id);
        if (empty($navs)) return [];

        $rootId = $this->authManager->applicationID;

        $items = [];
        foreach ($navs as $nav) {
            $icon = $nav->icon? '<i class="fa fa-'.$nav->icon.'"></i> ': '';
            $route = $this->formatRoute($nav->route);
            $items[] = [
                'label' => $icon . $nav->description,
                'url' => $route,
                'encode' => false,
                'active' => $rootId == $nav->name? true: false,
            ];
        }

        $this->items = $items;
    }

    protected function formatRoute($route)
    {
        if (preg_match('/(https?):\/\/.*/', $route)) return $route;

        return substr($route, 0, 1) == '/'? $route: '/'.$route;
    }
}