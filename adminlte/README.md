# 安装

## 配置（选择1或2）
1.配置bootstrap
~~~
    'aliases' => [
        '@adminlte' => '@app/adminlte',
    ],
    # 平台名称
    'name' => 'App',
    # 平台版本
    'version' => '1.0.0',
    # 指定layout
    'layout' => '@adminlte/layouts/main',
~~~
2.在composer.json 中配置（略）

## 应用
1.添加配置到Asset
~~~
    adminlte/AdminLteAsset::class,
    adminlte/CompatibleAsset::class, // 这个兼容bootstrap4.0的
~~~
2.引入adminlte样式
~~~
## 定义上线时间，用于设置copyright
defined('ONLINE_TIME') or define('ONLINE_TIME', date('Y'));
~~~


