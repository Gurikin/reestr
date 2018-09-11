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
class InputReestr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'input_reestr';
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

    public function getNumber($id) {
        if (($model = Number::findOne($id)) !== null) {
            return $model;
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
