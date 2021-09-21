<?php
namespace adminlte\models;

class Menu extends Role
{
    public $icon;

    public $rank;

    public $route;

    public function attributeLabels()
    {
        return [
            'id'            => '角色ID',
            'name'          => '角色名称',
            'description'   => '角色描述',
            'parent'        => '父级角色',
            'icon'          => '图标',
            'rank'          => '排序',
            'route'         => '路由',
        ];
    }

    public function attributes()
    {
        return ['id', 'name', 'description', 'parent', 'icon', 'rank', 'route'];
    }
}