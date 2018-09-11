<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "numbr".
 *
 * @property int $id
 * @property int $numbr
 * @property int $year
 * @property int $in_out
 * @property int $post_id
 *
 * @property Post $post
 */
class Number extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'number';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'year', 'in_out', 'post_id'], 'required'],
            [['number', 'year', 'in_out', 'post_id'], 'integer'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
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
            'year' => 'Year',
            'in_out' => 'In Out',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
}
