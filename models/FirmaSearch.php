<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Firma;

/**
 * FirmaSearch represents the model behind the search form about `app\models\Firma`.
 */
class FirmaSearch extends Firma
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_dept', 'id_supervisor', 'id_certificacion', 'firma','created_at', 'updated_at'], 'integer'],
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
    public function search($params, $dept_id = NULL, $id_cert = NULL, $id_sup = NULL)
    {
        if ($dept_id !== NULL && $id_cert !== NULL && $id_sup !== NULL) {
            $query = Firma::find()->where(['id_dept' => $dept_id])
                                  ->andWhere(['id_supervisor' => $id_sup])
                                  ->andWhere(['id_certificacion' => $id_cert])
                                  ->with(['supervisor']);
        } else {
            $query = Firma::find();
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
            'id_dept' => $this->id_dept,
            'id_supervisor' => $this->id_supervisor,
            'id_certificacion' => $this->id_certificacion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        $query->andFilterWhere(['like', 'firma', $this->firma]);

        return $dataProvider;
    }
}
