<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostReestrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reestr of inputs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-reestr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
//    \Yii::$container->set('yii\grid\GridView', [
//        'tableOptions' => [
//            'class' => 'table table-striped table-bordered',
//        ],
//    ]);

    ?>

    <?php
    Pjax::begin([]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'reestr'],
        //'rowOptions'=>['style' => array('vertical-align'=>'middle')],
        'columns' => [

            [
                'attribute' => 'number',
                'label' => 'N°',
                'headerOptions' => ['class' => 'number'],
                'contentOptions' => ['style' => array('vertical-align'=>'middle'),'class' => 'number'],
            ],
            [
                'attribute' => 'year',
                'headerOptions' => ['class' => 'year'],
                'contentOptions' => ['class' => 'year'],//'style' => array('vertical-align'=>'middle'),'class' => 'year'],
            ],
            [
                'attribute' => 'receipt_date',
                'headerOptions' => ['class' => 'date-col'],
                'contentOptions' => ['class' => 'date-col'],
                'value' => function ($data) {
                    $fdate = DateTime::createFromFormat('Y-m-j H:i:s',$data['receipt_date']);
                    return $fdate->format('M-j H:i');
                }
            ],
            [
                'attribute' => 'theme',
                'headerOptions' => ['class' => 'theme'],
                'contentOptions' => ['class' => 'theme'],
            ],
            [
                'attribute' => 'content',
                'headerOptions' => ['class' => 'content-col'],
                'contentOptions' => ['class' => 'content-col'],
            ],
            [
                'attribute' => 'bind_files',
                'headerOptions' => ['class' => 'files-col'],
                'contentOptions' => ['class' => 'files-col'],
            ],
            [
                'attribute' => 'in_out',
                'headerOptions' => ['class' => 'in-out'],
                'contentOptions' => ['class' => 'in-out'],
                'value' => function ($data) {
                    return ($data['in_out'])==0 ? 'Вх.' : 'Исх.';
                },
            ],
            'actionColumn' => [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'template' => '{view} {update}',
                'contentOptions' => ['class' => 'action-col'],
                'headerOptions' => ['class' => 'action-col'],
            ],
        ],
    ]);
    Pjax::end();?>
</div>