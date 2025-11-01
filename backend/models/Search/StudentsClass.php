<?php

namespace backend\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Students;

/**
 * StudentsClass represents the model behind the search form of `common\models\Students`.
 */
class StudentsClass extends Students
{
    public $class_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'class_id'], 'integer'],
            [['name'], 'safe'], // allow text search
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Students::find()->joinWith('studentClasses.class'); // 🔹 Join with class table

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // 🔹 Filter by student name
        $query->andFilterWhere(['like', 'students.name', $this->name]);

        // 🔹 Filter by class
        $query->andFilterWhere(['classes.id' => $this->class_id]);

        return $dataProvider;
    }
}
