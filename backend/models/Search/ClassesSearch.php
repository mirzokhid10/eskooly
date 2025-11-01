<?php

namespace backend\models\Search;

use yii\base\Model;
use common\models\Classes;
use yii\data\ActiveDataProvider;

/**
 * ClassesSearch represents the model behind the search form of `Classes`.
 */
class ClassesSearch extends Model
{
    public $id;
    public $name;
    public $monthly_fee;
    public $teacher_id;
    public $created_at;
    public $updated_at;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'teacher_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'safe'],
            [['monthly_fee'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     */
    public function search($params)
    {
        $query = Classes::find(); // ALWAYS query the main model/table

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // filtering
        $query->andFilterWhere([
            'id' => $this->id,
            'monthly_fee' => $this->monthly_fee,
            'teacher_id' => $this->teacher_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
