<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "resultado".
 *
 * @property integer $id
 * @property integer $id_supervisor
 * @property integer $id_certificacion
 * @property string $resultado
 * @property string $comentario
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Certificacion $idCertificacion
 * @property Supervisor $idSupervisor
 */
class Resultado extends \yii\db\ActiveRecord
{

    public $pregunta;
    public $_si;
    public $_no;
    public $_na;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resultado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_supervisor', 'id_certificacion'], 'required'],
            [['id_supervisor', 'id_certificacion', 'created_at', 'updated_at'], 'integer'],
            [['comentario'], 'string'],
            [['resultado'], 'string', 'max' => 12],
            [['id_certificacion'], 'exist', 'skipOnError' => true, 'targetClass' => Certificacion::className(), 'targetAttribute' => ['id_certificacion' => 'id']],
            [['id_supervisor'], 'exist', 'skipOnError' => true, 'targetClass' => Supervisor::className(), 'targetAttribute' => ['id_supervisor' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id:',
            'id_supervisor' => 'Supervisor Id:',
            'id_certificacion' => 'Certidicación Id:',
            'resultado' => 'Resultado:',
            'comentario' => 'Explicación:',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
    * @yii\behaviors\TimestampBehavior
    */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCertificacion()
    {
        return $this->hasOne(Certificacion::className(), ['id' => 'id_certificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSupervisor()
    {
        return $this->hasOne(Supervisor::className(), ['id' => 'id_supervisor']);
    }
    public function getResultado()
    {
        switch ($this->resultado) {
            case 'no':
                return "No";
            break;
            case 'si':
                return "Si";
            break;
            default:
                return "N/A";
            break;
        }
    }
}
