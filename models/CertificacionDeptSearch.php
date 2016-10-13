<?php
<<<<<<< HEAD

namespace app\models;

=======
namespace app\models;
>>>>>>> refs/remotes/origin/dev
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Certificacion;
use app\models\Empleado;
<<<<<<< HEAD

=======
>>>>>>> refs/remotes/origin/dev
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
<<<<<<< HEAD

=======
>>>>>>> refs/remotes/origin/dev
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
<<<<<<< HEAD

=======
>>>>>>> refs/remotes/origin/dev
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
<<<<<<< HEAD
    public function search($params, $estado_id = 1,$dept_id = 1,$id_emp = 1)
    {
        //$query = Empleado::find()->innerJoin(['certificacion'])
        //->where(['and','certificacion.id_estado =  1','certificacion.id_empleado = 1', 'certificacion.id_empleado = empleado.id']);

=======
    public function search($params, $estado_id = NULL,$dept_id = NULL,$id_emp =NULL)
    {
        //$query = Empleado::find()->innerJoin(['certificacion'])
        //->where(['and','certificacion.id_estado =  1','certificacion.id_empleado = 1', 'certificacion.id_empleado = empleado.id']);
>>>>>>> refs/remotes/origin/dev
        if ($dept_id !== NULL && $estado_id !== NULL && $id_emp !== NULL) {
            $query = Empleado::find()->innerJoin(['certificacion'])
                                  ->where(['id_dept' => $dept_id])
                                  ->andwhere(['id_empleado' => $id_emp])
                                  ->andWhere(['id_estado' => $estado_id]);
                                  //->with(['empleado']);
        } else {
            $query = Empleado::find();
        }
<<<<<<< HEAD

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

=======
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
>>>>>>> refs/remotes/origin/dev
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
<<<<<<< HEAD

=======
>>>>>>> refs/remotes/origin/dev
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
