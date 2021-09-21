<?php

namespace adminlte;

use Yii;
use yii\base\InvalidArgumentException;
use yii\base\InvalidCallException;
use yii\helpers\ArrayHelper;

class AuthMenu extends Menu
{
    /**
     * @var array|object
     */
    public $menus;
    /**
     * @var array
     */
    public $items;
    /**
     * @var string|array
     */
    public $orderBy;
    /**
     * @var array
     */
    public $defaultItems = [];

    public function run()
    {
        if (empty($this->items)) {
            $this->guessMenuItems();
        }

        parent::run();
    }

    public function guessMenuItems()
    {
        $menus = $this->menus;

        if (empty($menus)) return;

        $list = ArrayHelper::index($menus, null, 'parent');

        $parent = array_shift($list);

        array_multisort(ArrayHelper::getColumn($parent, 'rank'), SORT_ASC, $parent);

        $items = $this->getChildrenRecursive($parent, $list);

        $this->items = ArrayHelper::merge($this->defaultItems, array_values($items));
    }

    protected function getChildrenRecursive($parentList, $childrenList)
    {
        foreach ($parentList as $name => $item) {
            $items[$item->name] = $this->itemProvider($item);

            if (empty($children = $childrenList[$item->name]?? false)) continue;

            $childrenItems = $this->getChildrenRecursive($children, $childrenList);

            if (count($childrenItems) == 1) {
                $child = reset($childrenItems);
                $items[$item->name]['url'] = $child['url'];

                if (is_array($child['url'])) continue;
            }else {
                $items[$item->name]['url'] = '#';
            }

            $items[$item->name]['items'] = array_values($childrenItems);
        }

        return $items;
    }

    protected function itemProvider($item)
    {
        $result = [
            'label' => $item->description,
            'icon' => $item->icon,
            'url' => $item->route,
        ];

        if (!is_array($item->route)) {
            $result['linkOptions']['target'] = "_blank";
        }

        return $result;
    }
}