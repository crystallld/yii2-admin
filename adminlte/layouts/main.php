<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use adminlte\ScrollTop;
use adminlte\AppAsset;
use adminlte\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="sidebar-mini skin-blue" data-spy="scroll">
<?php $this->beginBody() ?>

<div class="wrapper">
    <!--    header top bar -->
    <?= $this->render('header') ?>

    <!--    lefter menu -->
    <?= $this->render('lefter'); ?>

    <!-- Content Wrapper. Contains page content -->
    <?= $this->render('wrapper', ['content' => $content]) ?>

    <?= ScrollTop::widget() ?>
    <?= $this->render('footer') ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
