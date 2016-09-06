<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property integer $id
 * @property integer $id_certificacion
 * @property string $nombre
 * @property string $apellido_m
 * @property string $apellido_p
 * @property integer $seguro_social
 * @property string $nombramiento
 * @property string $puesto
 * @property string $oficina_division
 * @property integer $fecha_empleado
 * @property string $razon_cese
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Certificacion[] $certificacions
 * @property EmpleadoSupervisor[] $empleadoSupervisors
 */
class Solicitar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_certificacion', 'nombre', 'apellido_m', 'apellido_p', 'seguro_social', 'nombramiento'], 'required'],
            [['id_certificacion', 'seguro_social', 'fecha_empleado', 'created_at', 'updated_at'], 'integer'],
            [['nombre', 'puesto', 'oficina_division'], 'string', 'max' => 56],
            [['apellido_m', 'apellido_p', 'nombramiento'], 'string', 'max' => 128],
            [['razon_cese'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_certificacion' => 'Id Certificacion',
            'nombre' => 'Nombre',
            'apellido_m' => 'Apellido M',
            'apellido_p' => 'Apellido P',
            'seguro_social' => 'Seguro Social',
            'nombramiento' => 'Nombramiento',
            'puesto' => 'Puesto',
            'oficina_division' => 'Oficina Division',
            'fecha_empleado' => 'Fecha Empleado',
            'razon_cese' => 'Razon Cese',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificacions()
    {
        return $this->hasMany(Certificacion::className(), ['id_empleado' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleadoSupervisors()
    {
        return $this->hasMany(EmpleadoSupervisor::className(), ['empleado_id' => 'id']);
    }
}
