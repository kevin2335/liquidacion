<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Solicitar;

/**
 * SolicitarSearch represents the model behind the search form about `app\models\Solicitar`.
 */
class SolicitarSearch extends Solicitar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_certificacion', 'seguro_social', 'fecha_empleado', 'created_at', 'updated_at'], 'integer'],
            [['nombre', 'apellido_m', 'apellido_p', 'nombramiento', 'puesto', 'oficina_division', 'razon_cese'], 'safe'],
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
        $query = Solicitar::find();

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
            'id_certificacion' => $this->id_certificacion,
            'seguro_social' => $this->seguro_social,
            'fecha_empleado' => $this->fecha_empleado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido_m', $this->apellido_m])
            ->andFilterWhere(['like', 'apellido_p', $this->apellido_p])
            ->andFilterWhere(['like', 'nombramiento', $this->nombramiento])
            ->andFilterWhere(['like', 'puesto', $this->puesto])
            ->andFilterWhere(['like', 'oficina_division', $this->oficina_division])
            ->andFilterWhere(['like', 'razon_cese', $this->razon_cese]);

        return $dataProvider;
    }
}
