<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pregunta;

/**
 * PreguntaSearch represents the model behind the search form about `app\models\Pregunta`.
 */
class PreguntaSearch extends Pregunta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_dept', 'no_bool', 'si_bool', 'na_bool'], 'integer'],
            [['pregunta'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Pregunta::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'id_dept' => $this->id_dept,
            'no_bool' => $this->no_bool,
            'si_bool' => $this->si_bool,
            'na_bool' => $this->na_bool,
        ]);

        $query->andFilterWhere(['like', 'pregunta', $this->pregunta]);

        return $dataProvider;
    }
}
