<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supervisor".
 *
 * @property integer $id
 * @property integer $id_dept
 * @property string $nombre_sup
 * @property string $apellido_m_sup
 * @property string $apellido_p_sup
 *
 * @property EmpleadoSupervisor[] $empleadoSupervisors
 * @property Firmas[] $firmas
 * @property Resultado[] $resultados
 * @property Departamento $idDept
 */
class Supervisor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supervisor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dept'], 'required'],
            [['id_dept'], 'integer'],
            [['nombre_sup', 'apellido_m_sup', 'apellido_p_sup'], 'string', 'max' => 12],
            [['activo'], 'required'],
            [['id_dept'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['id_dept' => 'id']],
            [['activo'], 'exist', 'skipOnError' => true, 'targetAttribute' => ['activo']],
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
            'nombre_sup' => 'Nombre del supervisor:',
            'apellido_m_sup' => 'Apellido materno del superrvisor:',
            'apellido_p_sup' => 'Apellido paterno del supervisor',
            'activo'=>'Activo:',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleadoSupervisors()
    {
        return $this->hasMany(EmpleadoSupervisor::className(), ['supervisor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirmas()
    {
        return $this->hasMany(Firmas::className(), ['id_supervisor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultados()
    {
        return $this->hasMany(Resultado::className(), ['id_supervisor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDept()
    {
        return $this->hasOne(Departamento::className(), ['id' => 'id_dept']);
    }
}
