<?php
use yii\helpers\Url;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use app\models\Notice;
use kartik\markdown\Markdown;
use kartik\markdown\MarkdownEditor;

$route = $this->context->route;
# 游客不做提醒
if (empty(Yii::$app->user->identity)) return;

$model = Yii::$app->user->identity->notice($route);
if (!$model) return;

Modal::begin([
    'id' => 'new_func_notice_modal',
    'size' => Modal::SIZE_LARGE,
    'options' => [
        'width' => '800px;'
    ],
    'header'=> $model->title,
    'toggleButton' => [
        'label'=>$model->title, 'class'=>'btn btn-primary',
        'style' => 'display: none;'
    ],
    'clientOptions' => [
        'show' => true,
        'modal' => true,
        'autoOpen' => true,
    ],
    'footer' => Html::button('不再提醒', [
        'id' => 'not_notice_to_me',
        'class' => 'btn btn-info', //'onclick' => 'ajaxGotNotice(2)'
    ])
]);

echo Markdown::convert($model->detail);

Modal::end();

$url = Url::toRoute(['/user/notice']);
$js = <<< JS
// modal hidden event
$('#new_func_notice_modal').on('hidden.bs.modal', function () {
    ajaxGotNotice(1);
});
// modal onclick event
$('#new_func_notice_modal .modal-header').find('button').click(function() {
    ajaxGotNotice(1);
});
// button onclick event
$('#not_notice_to_me').click(function() {
    ajaxGotNotice(2);
    $('#new_func_notice_modal').modal('hide');
});

function ajaxGotNotice(type) {
  $.ajax({
        type: 'post',
        url: '$url',
        data: {type: type}
    })
}
JS;
$this->registerJs($js);//, ['position' => $this::POS_HEAD]
