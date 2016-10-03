<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Certificacion;
use app\models\Empleado;

/**
 * CertificacionSearch represents the model behind the search form about `app\models\Certificacion`.
 */
class CertificacionDeptSearch extends Certificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_empleado', 'id_estado'], 'integer'],
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
    public function search($params, $estado_id = 1)
    {
        $query = Empleado::find()->innerJoin(['certificacion'])->where(['not in','id_estado', $estado_id]);


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
            'id_empleado' => $this->id_empleado,
            'id_estado' => $this->id_estado,
        ]);
        //$query->andFilterWhere(['like', 'id_empleado', $this->empleado->name]);
        return $dataProvider;
    }
}
