<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\PostReestr */

$this->title = 'Test output';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="test">

    <h1><?= Html::encode($this->title) ?></h1>


<?= $this->render('_form', [
    'model' => $model,
]) ?>