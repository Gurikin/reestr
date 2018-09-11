<?php

use yii\helpers\Html;
use app\models\Post;

/* @var $this yii\web\View */
/* @var $model app\models\InputReestr */


\app\models\Utils::debug($model->getNumber($model->post_reestr_id));

$this->title = 'Изменить письмо номер: ' . $model->number;

$this->params['breadcrumbs'][] = ['label' => 'Reestr', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->post_reestr_id, 'url' => ['view', 'id' => $model->post_reestr_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
