<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resultado;

/**
 * ResultadoSearch represents the model behind the search form about `app\models\Resultado`.
 */
class ResultadoOneSearch extends Resultado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_supervisor', 'id_certificacion', 'created_at', 'updated_at'], 'integer'],
            [['resultado', 'comentario'], 'safe'],
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
    public function search($params, $id_cert)
    {
        $query = Resultado::find()->innerJoin(['certificacion'])->innerJoin(['empleado'])->where(['and', 'certificacion.id = resultado.id_certificacion', 'certificacion.id_empleado = empleado.id', 'certificacion.id' => $id_cert]);

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
            'id_supervisor' => $this->id_supervisor,
            'id_certificacion' => $this->id_certificacion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'resultado', $this->resultado])
            ->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
}
