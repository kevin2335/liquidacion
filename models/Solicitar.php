<?php
namespace app\models;
use Yii;
use yii\behaviors\TimestampBehavior;
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
 * @property string $email
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
            [['nombre', 'apellido_m', 'apellido_p', 'nombramiento','email'], 'required'],
            [['seguro_social', 'fecha_empleado', 'created_at', 'updated_at'], 'integer'],
            [['nombre', 'puesto', 'oficina_division'], 'string', 'max' => 56],
            [['apellido_m', 'apellido_p', 'nombramiento'], 'string', 'max' => 128],
            [['razon_cese'], 'string', 'max' => 20], [['email'], 'string', 'max' => 128],
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
            'email' => 'Email:',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
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
}
