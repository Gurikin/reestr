<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "input_reestr".
 *
 * @property int $id
 * @property int $number
 * @property int $year
 * @property string $theme
 * @property string $receipt_date
 * @property string $content
 * @property string $bind_files
 * @property int $in_out
 */
class PostReestr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_reestr_view';
    }

    public static function primaryKey()
    {
        return ["post_reestr_id"];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'year', 'in_out'], 'required'],
            [['number', 'year', 'in_out'], 'integer'],
            [['receipt_date'], 'safe'],
            [['content', 'bind_files'], 'string'],
            [['theme'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_reestr_id' => 'id',
            'number' => "N",
            'year' => 'Год',
            'theme' => 'Тема',
            'receipt_date' => 'Дата',
            'content' => 'Содержание',
            'bind_files' => 'Файлы',
            'in_out' => 'Направление',
        ];
    }

    /**
     * @param $id
     * @return $this|bool|null
     */
    public static function reestrUpdate($id) {
        $model = self::findOne($id);
        $postModel = $model->getPost($id);
        $numberModel = $model->getNumber($model->post_reestr_id);
        if ($model->load($post = Yii::$app->request->post())) {
            $numberModel->number = $post['PostReestr']['number'];
            $numberModel->year = $post['PostReestr']['year'];
            $numberModel->in_out = $post['PostReestr']['in_out'];
            $postModel->theme = $post['PostReestr']['theme'];
            $postModel->receipt_date = $post['PostReestr']['receipt_date'];
            $postModel->content = $post['PostReestr']['content'];
            if ($numberModel->save() == false && $postModel->save() == false) {
                return false;
            }
            return $model;
        }
        return null;
    }

    public function getNumber($id) {
        if ($model = Number::find()->where(['post_id'=>$id])) {
            return $model->one();
        }
        return false;
    }

    public function getPost($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }
        return false;
    }
}
