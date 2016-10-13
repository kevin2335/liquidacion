<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property integer $id
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
 * @property EmpledoSupervisor[] $empledoSupervisors
 */
class Empleado extends \yii\db\ActiveRecord
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
            [['nombre', 'apellido_m', 'apellido_p', 'seguro_social', 'nombramiento'], 'required'],
            [['seguro_social', 'fecha_empleado', 'created_at', 'updated_at'], 'integer'],
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
            'id' => 'id:',
            'nombre' => 'Nombre:',
            'apellido_m' => 'Apellido Materno:',
            'apellido_p' => 'Apellido Paterno:',
            'seguro_social' => 'Seguro Social:',
            'nombramiento' => 'Nombramiento:',
            'puesto' => 'Puesto que ocupa:',
            'oficina_division' => 'Oficina o división:',
            'fecha_empleado' => 'Fecha del cese o cambio:',
            'razon_cese' => 'Razón de cese:',
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
    public function getEmpledoSupervisors()
    {
        return $this->hasMany(EmpledoSupervisor::className(), ['empleado_id' => 'id']);
    }

    /**
    * Concatena el nombre con los apellidos
    * @return string
    */
    public function getSolicitante()
    {
        return $this->nombre.' '.$this->apellido_p.' '.$this->apellido_m;
    }
    
}
