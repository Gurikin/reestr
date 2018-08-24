<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $receipt_date
 * @property string $theme
 * @property string $content
 * @property string $bind_files
 *
 * @property Numbr[] $numbrs
 * @property PostFolder[] $postFolders
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'receipt_date' => 'Receipt Date',
            'theme' => 'Theme',
            'content' => 'Content',
            'bind_files' => 'Bind Files',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumbrs()
    {
        return $this->hasMany(Numbr::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostFolders()
    {
        return $this->hasMany(PostFolder::className(), ['post_id' => 'id']);
    }
}
