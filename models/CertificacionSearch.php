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
class CertificacionSearch extends Certificacion
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
    public function search($params, $empleado_id = NULL)
    {
        if ($empleado_id !== NULL) {
            $query = Certificacion::find()->with(['estado','empleado'])
                                 ->where(['id_empleado' => $empleado_id]);
        } else {
            $query = Certificacion::find();
        }

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

        return $dataProvider;
    }
    public function search2($params)
    {
        $query2 = Certificacion::find()->where(['id_empleado = 1']);

        // add conditions that should always apply here
        $certificaciones_firmar = new ActiveDataProvider([
            'query' => $query2,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $certificaciones_firmar;
        }

        // grid filtering conditions
        $query2->andFilterWhere([
            'id' => $this->id,
            'id_empleado' => $this->id_empleado,
            'id_estado' => $this->id_estado,
        ]);

        return $certificaciones_firmar;
    }
    public function search3($params, $sup_id = NULL)
    {
        $query = Certificacion::find()->with(['estado'])
                                      ->where(['id_estado' => 3]);

        /*$query = EmpleadoSupervisor::find()->with(['empleado'])
                                      ->where(['supervisor_id' => $sup_id]);*/

        // add conditions that should always apply here

        $empleado = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $empleado;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_empleado' => $this->id_empleado,
            'id_estado' => $this->id_estado,
        ]);

        return $empleado;
    }
}
