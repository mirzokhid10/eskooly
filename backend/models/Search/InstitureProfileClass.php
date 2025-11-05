<?php

namespace backend\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InstituteProfile;

/**
 * InstitureProfileClass represents the model behind the search form of `common\models\InstituteProfile`.
 */
class InstitureProfileClass extends InstituteProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['institute_name', 'institute_logo', 'institute_website', 'institute_phone', 'institute_address', 'institute_country', 'created_at', 'updated_at'], 'safe'],
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
        $query = InstituteProfile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'institute_name', $this->institute_name])
            ->andFilterWhere(['like', 'institute_logo', $this->institute_logo])
            ->andFilterWhere(['like', 'institute_website', $this->institute_website])
            ->andFilterWhere(['like', 'institute_phone', $this->institute_phone])
            ->andFilterWhere(['like', 'institute_address', $this->institute_address])
            ->andFilterWhere(['like', 'institute_country', $this->institute_country]);

        return $dataProvider;
    }
}
