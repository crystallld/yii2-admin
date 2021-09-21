<?php
use yii\helpers\Url;
use yii\helpers\Inflector;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
?>
<style>
    .dropdown-menu >li >a {
        padding: 6px 15px;
    }
</style>
<header class="main-header">
    <!-- Logo -->
    <?= Html::a('<span class="logo-mini"><b>ES</b></span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" title="切换导航栏">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <?php
        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [],
        ]);
        ?>

        <div class="navbar-custom-menu" style="margin-right: 10px;">
            <?php
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    Yii::$app->user->isGuest ? (
                    [
                        'label' => Html::icon('log-in').Yii::t('app', 'Login'),
                        'url' => '/site/login',
                    ]
                    ) : (
                    ['label' => Html::icon('user').'(' . Yii::$app->user->identity->username . ')',
                        'items' => [
                            [
                                'label' => Html::icon('heart'). Yii::t('app', 'User Info'),
                                'url' => ['/user/info'],
                            ],
                            [
                                'label' => Html::icon('log-out'). Yii::t('app', 'Logout'),
                                'url' => ['/site/logout'],
                            ],
                        ],
                    ]),
                    [
                        'label' => '<i class="fa fa-gears"></i>',
                        'url' => '#',
                        'options' => ['data-toggle' => 'control-sidebar'],
                    ]
                ],
            ]);
            ?>
        </div>
    </nav>

    <?= $this->render('sidebar.php') ?>
</header>