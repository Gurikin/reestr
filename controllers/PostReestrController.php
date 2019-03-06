<?php

namespace app\controllers;

use app\models\Utils;
use Yii;
use app\models\PostReestr;
use app\models\PostReestrSearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class PostReestrController extends ActiveController
{
    public $modelClass = 'app\models\PostReestr';

    public $reservedParams = ['sort','q'];

    public function actions() {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider() {
        $searchModel = new \app\models\PostReestrSearch();
        return $searchModel->search(\Yii::$app->request->queryParams);
    }

    /**
     * {@inheritdoc}
     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }
//
//    /**
//     * Lists all input_reestr models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//        $searchModel = new PostReestrSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }
//
//    /**
//     * Displays a single input_reestr model.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return PostReestr::findOne($id);
////        return $this->render('view', [
////            'model' => $this->findModel($id),
////        ]);
//    }
//
//    /**
//     * Updates an existing InputReestr model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     * TODO create the checkUpdate method (in the InputReestr class) that will be compare the POST fields to the model fields
//     */
//    public function actionUpdate($id)
//    {
//        $model = PostReestr::reestrUpdate($id);
//        if ($model !== null) {
//            if ($model !== false) {
//                return $this->render('view', [
//                    'model' => $this->findModel($id),
//                ]);
//            } else {
//                Utils::debug("Error on update DB.");
//            }
//        }
//        $model = $this->findModel($id);
//        return $this->render('update', [
//            'model' => $model
//        ]);
//    }
//
//    /**
//     * Finds the Post model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return PostReestr the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = PostReestr::findOne($id)) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
}
