<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostReestr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-reestr-form">

    <?php $form = ActiveForm::begin([
        'method' => 'PUT',
        'action' => ['rest/post-reestr/update?id='.$model->post_reestr_id],
    ]); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'theme')->textInput() ?>

    <?= $form->field($model, 'receipt_date')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php //echo $form->field($model, 'bind_files')->label([]) ?>

    <?php //echo $form->field($model, 'bind_files')->fileInput([]) ?>

    <?= $form->field($model, 'in_out')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
