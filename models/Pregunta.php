<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "preguntas".
 *
 * @property integer $id
 * @property integer $id_dept
 * @property string $pregunta
 * @property integer $no_bool
 * @property integer $si_bool
 * @property integer $na_bool
 *
 * @property Departamento $idDept
 */
class Pregunta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preguntas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dept', 'pregunta'], 'required'],
            [['id_dept', 'no_bool', 'si_bool', 'na_bool'], 'integer'],
            [['pregunta'], 'string'],
            [['id_dept'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['id_dept' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id:',
            'id_dept' => 'Departamento Id:',
            'pregunta' => 'Pregunta:',
            'no_bool' => 'No',
            'si_bool' => 'Sí',
            'na_bool' => 'N/A',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDept()
    {
        return $this->hasOne(Departamento::className(), ['id' => 'id_dept']);
    }
}
