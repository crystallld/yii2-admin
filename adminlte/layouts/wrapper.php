<?php
use yii\widgets\Breadcrumbs;
use adminlte\Alert;
?>
<div class="content-wrapper">
    <?= Alert::widget() ?>
    
    <?php echo Breadcrumbs::widget([
        'links' => $this->params['breadcrumbs']?? [],
    ]);
    ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="padding: 15px 15px 40px 15px;">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </section>

</div>