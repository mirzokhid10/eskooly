<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StudentPayments;

/**
 * StudentPaymentsSearch represents the model behind the search form of `common\models\StudentPayments`.
 */
class StudentPaymentsSearch extends StudentPayments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'course_id'], 'integer'],
            [['fee_month', 'fee_date', 'status', 'created_at', 'updated_at'], 'safe'],
            [['total_amount', 'deposit_amount', 'due_balance'], 'number'],
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
    public function search($params, $formName = null)
    {

        $query = StudentPayments::find();
        $query = StudentPayments::find()->with(['student.class']);
        // add conditions that should always apply here

//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//        ]);
//
//        $this->load($params, $formName);
//
//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }
//
//        // grid filtering conditions
//        $query->andFilterWhere([
//            'id' => $this->id,
//            'student_id' => $this->student_id,
//            'course_id' => $this->course_id,
//            'fee_date' => $this->fee_date,
//            'total_amount' => $this->total_amount,
//            'deposit_amount' => $this->deposit_amount,
//            'due_balance' => $this->due_balance,
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
//        ]);
//
//        $query->andFilterWhere(['like', 'fee_month', $this->fee_month])
//            ->andFilterWhere(['like', 'status', $this->status]);
//
//        return $dataProvider;
    }
}
