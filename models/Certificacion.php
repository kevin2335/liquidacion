<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "certificacion".
 *
 * @property integer $id
 * @property integer $id_empleado
 * @property integer $id_estado
 * @property Empleado $idEmpleado
 * @property Estado $idEstado
 * @property Firmas[] $firmas
 * @property Resultado[] $resultados
 */
class Certificacion extends \yii\db\ActiveRecord
{

    public $is_rejected;
    public $nameEmpleado;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'certificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado', 'id_estado'], 'required'],
            [['id_empleado', 'id_estado'], 'integer'],
            [['id_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['id_empleado' => 'id']],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['id_estado' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id:',
            'id_empleado' => 'Empleado Id:',
            'id_estado' => 'estado Id:',
            'name'=>'Certificación:'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['id' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['id' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirmas()
    {
        return $this->hasMany(Firmas::className(), ['id_certificacion' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultados()
    {
        return $this->hasMany(Resultado::className(), ['id_certificacion' => 'id']);
        // switch ($this->id_estado) {
        //     case '2':
        //         return "Aceptada";
        //     break;
        //     default:
        //         return "Rechazada";
        //     break;
    }

    public function getIsRejected()
    {
        return ($this->is_rejected == 1)? 'Rechazado' : 'Aprobado';
    }
    
}
