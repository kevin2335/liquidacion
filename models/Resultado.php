<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resultado".
 *
 * @property integer $id
 * @property integer $id_supervisor
 * @property integer $id_certificacion
 * @property string $resultado
 * @property integer $si_bool
 * @property integer $no_bool
 * @property integer $na_bool
 * @property string $comentario
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Certificacion $idCertificacion
 * @property Supervisor $idSupervisor
 */
class Resultado extends \yii\db\ActiveRecord
{
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
            [['id_supervisor', 'id_certificacion', 'si_bool', 'no_bool', 'na_bool', 'created_at', 'updated_at'], 'integer'],
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
            'si_bool' => 'Sí',
            'no_bool' => 'No',
            'na_bool' => 'N/A',
            'comentario' => 'Explicación:',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
}
