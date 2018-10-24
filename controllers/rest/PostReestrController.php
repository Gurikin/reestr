<?php
namespace app\controllers\rest;

use yii;
use yii\rest\ActiveController;
use app\models\PostReestr;
use yii\web\Response;

class PostReestrController extends ActiveController
{
    public $modelClass = 'app\models\PostReestr';

    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['verbs'] = [
            'class' => \yii\filters\VerbFilter::className(),
            'actions' => [
                'index'  => ['get'],
                'view'   => ['get'],
                'create' => ['post'],
                'update' => ['post'],
                'delete' => ['delete'],
            ]
        ];
        return $behaviors;
    }

    public function beforeAction($event)
    {
        $action = $event->id;
        if (isset($this->actions[$action])) {
            $verbs = $this->actions[$action];
        } elseif (isset($this->actions['*'])) {
            $verbs = $this->actions['*'];
        } else {
            return $event->isValid;
        }
        $verb = Yii::$app->getRequest()->getMethod();
        $allowed = array_map('strtoupper', $verbs);
        if (!in_array($verb, $allowed)) {
            $this->getHeader(400);
            echo json_encode(['status' => 0, 'error_code' => 400, 'message' => 'Method not allowed'], JSON_PRETTY_PRINT);
            exit;
        }
        return true;
    }

    /**
     * Return a single post_reestr model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return json_encode($this->findModel($id),JSON_PRETTY_PRINT);
    }

    /**
     * Updates an existing InputReestr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * TODO create the checkUpdate method (in the InputReestr class) that will be compare the POST fields to the model fields
     */
    public function actionReestrUpdate($id)
    {
        $model = $this->findModel($id);
        $postModel = $model->getPost($id);
        $numberModel = $model->getNumber($model->post_reestr_id);
        if ($model->load($post = Yii::$app->request->post())) {
            $numberModel->number = $post['PostReestr']['number'];
            $numberModel->year = $post['PostReestr']['year'];
            $numberModel->in_out = $post['PostReestr']['in_out'];
            $postModel->theme = $post['PostReestr']['theme'];
            $postModel->receipt_date = $post['PostReestr']['receipt_date'];
            $postModel->content = $post['PostReestr']['content'];
            if ($numberModel->save() == false || $postModel->save() == false) {
                //return json_encode("Error on update DB.",JSON_PRETTY_PRINT);
                return "All bad";
            }
            //return json_encode($this->findModel($id),JSON_PRETTY_PRINT);
            return "All right";
        }
        //return json_encode($this->findModel($id),JSON_PRETTY_PRINT);
        return "wrong method";
//        $model = PostReestr::reestrUpdate($id);
//        if ($model !== null) {
//            if ($model !== false) {
//                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//                return json_encode($this->findModel($id),JSON_PRETTY_PRINT);
//            } else {
//                return json_encode("Error on update DB.",JSON_PRETTY_PRINT);
//            }
//        }
//        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        return json_encode($this->findModel($id),JSON_PRETTY_PRINT);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PostReestr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PostReestr::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function getHeader($status)
    {
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->getStatusCodeMessage($status);
        $content_type = "application/json; charset=utf-8";
        header($status_header);
        header('Content-type: ' . $content_type);
        header('SecretKey: ' . "xxxxx");
    }
    private function getStatusCodeMessage($status)
    {
        $codes = [
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        ];
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
}