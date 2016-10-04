<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Supervisor;

/**
 * SupervisorSearch represents the model behind the search form about `app\models\Supervisor`.
 */
class SupervisorSearch extends Supervisor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_dept'], 'integer'],
            [['nombre_sup', 'apellido_m_sup', 'apellido_p_sup','activo'], 'safe'],
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
        $query = Supervisor::find();

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
        ]);

        $query->andFilterWhere(['like', 'nombre_sup', $this->nombre_sup])
            ->andFilterWhere(['like', 'apellido_m_sup', $this->apellido_m_sup])
            ->andFilterWhere(['like', 'apellido_p_sup', $this->apellido_p_sup]);

        return $dataProvider;
    }
}
