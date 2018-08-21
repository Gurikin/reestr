<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "input_post".
 *
 * @property int $id
 * @property int $number
 * @property string $receipt_date
 * @property string $theme
 * @property string $content
 * @property string $bind_files
 *
 * @property PostBind[] $postBinds
 */
class InputPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'input_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number'], 'integer'],
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
            'id' => 'ID',
            'number' => 'Number',
            'receipt_date' => 'Receipt Date',
            'theme' => 'Theme',
            'content' => 'Content',
            'bind_files' => 'Bind Files',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostBinds()
    {
        return $this->hasMany(PostBind::className(), ['input_id' => 'id']);
    }
}
