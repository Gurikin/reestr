<?php
/**
 * Created by PhpStorm.
 * User: gurik
 * Date: 28.08.2018
 * Time: 6:58
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PostReestr;


class PostReestrSearch extends PostReestr
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_reestr_id', 'number', 'year'], 'integer'],
            [['in_out'], 'boolean'],
            [['receipt_date', 'theme', 'content', 'bind_files'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PostReestr::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'theme', $this->theme])
            ->andFilterWhere(['like', 'receipt_date', $this->receipt_date])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'bind_files', $this->bind_files])
            ->andFilterWhere(['like', 'in_out', $this->in_out]);

        return $dataProvider;
    }
}