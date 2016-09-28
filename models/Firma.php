<?php

namespace app\models;
use Yii;
use yii\behaviors\TimestampBehavior;
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
 * @property Supervisor $idSupervisor
 * @property Certificacion $idCertificacion
 */
class Firma extends \yii\db\ActiveRecord
{
    const ACEPTADO = 1;
    const RECHAZADO= 0;
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
            [['firma'], 'default','value' => self::ACEPTADO],
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
    public function getSupervisor()
    {
        return $this->hasOne(Supervisor::className(), ['id' => 'id_supervisor']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificacion()
    {
        return $this->hasOne(Certificacion::className(), ['id' => 'id_certificacion']);
    }
    /**
     * @return string
     */
    public function getFirmaLable()
    {
        return ($this->firma == self::ACEPTADO)? 'Aceptado' : 'Rechazado';
    }
    /**
     * @return BOOL
     */
    public function isApproved()
    {
        return ($this->firma == self::ACEPTADO);
    }
}
