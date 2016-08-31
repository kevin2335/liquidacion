<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "firmas".
 *
 * @property integer $id
 * @property integer $id_supervisor
 * @property integer $id_certificacion
 * @property integer $firma
 * @property integer $fecha_firma
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Supervisor $idSupervisor
 * @property Certificacion $idCertificacion
 */
class Firma extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'firmas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_supervisor', 'id_certificacion', 'firma'], 'required'],
            [['id_supervisor', 'id_certificacion', 'firma', 'fecha_firma', 'created_at', 'updated_at'], 'integer'],
            [['id_supervisor'], 'exist', 'skipOnError' => true, 'targetClass' => Supervisor::className(), 'targetAttribute' => ['id_supervisor' => 'id']],
            [['id_certificacion'], 'exist', 'skipOnError' => true, 'targetClass' => Certificacion::className(), 'targetAttribute' => ['id_certificacion' => 'id']],
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
            'id_certificacion' => 'Certificacion Id:',
            'firma' => 'Firma:',
            'fecha_firma' => 'Fecha:',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSupervisor()
    {
        return $this->hasOne(Supervisor::className(), ['id' => 'id_supervisor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCertificacion()
    {
        return $this->hasOne(Certificacion::className(), ['id' => 'id_certificacion']);
    }
}
