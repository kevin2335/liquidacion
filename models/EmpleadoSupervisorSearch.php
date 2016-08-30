<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmpleadoSupervisor;

/**
 * EmpleadoSupervisorSearch represents the model behind the search form about `app\models\EmpleadoSupervisor`.
 */
class EmpleadoSupervisorSearch extends EmpleadoSupervisor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'empleado_id', 'supervisor_id'], 'integer'],
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
        $query = EmpleadoSupervisor::find();

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
            'empleado_id' => $this->empleado_id,
            'supervisor_id' => $this->supervisor_id,
        ]);

        return $dataProvider;
    }
}
