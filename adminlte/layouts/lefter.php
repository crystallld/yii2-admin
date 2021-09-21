<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Html;
use adminlte\AuthMenu;

$user = Yii::$app->user->identity?? null;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
<!--                设置用户头像-->
                <img src="/favicon.ico" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <?php if(!is_null($user)): ?>
                <p><?= Html::a($user->username, ['/user/info']);?></p>
                <a href="<?= Url::toRoute('site/logout')?>"><i class="fa fa-circle text-success"></i>退出</a>
                <?php else: ?>
                    <a href="<?= Url::toRoute('site/login')?>"><i class="fa fa-circle text-danger"></i>未登录</a>
                <?php endif; ?>
            </div>
        </div>
        <?php
        echo AuthMenu::widget([
            'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
            'hideEmptyItems' => false,
            'menus' => [],
            'orderBy' => 'rank',
            'defaultItems' => [
                [
                    'label' => '菜单项',
                    'options' => ['class' => 'header']
                ],
                [
                    'label' => Yii::t('app', '查询首页'),
                    'icon' => 'home',
                    'url' => ['/site/index'],
                ],
            ],
        ]);
        ?>
    </section>
</aside>
