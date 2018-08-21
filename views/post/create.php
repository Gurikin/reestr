<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InputPost */

$this->title = 'Create Input Post';
$this->params['breadcrumbs'][] = ['label' => 'Input Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="input-post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
