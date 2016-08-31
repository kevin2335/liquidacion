<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado_supervisor".
 *
 * @property integer $id
 * @property integer $empleado_id
 * @property integer $supervisor_id
 *
 * @property Empleado $empleado
 * @property Supervisor $supervisor
 */
class EmpleadoSupervisor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado_supervisor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'empleado_id', 'supervisor_id'], 'integer'],
            [['empleado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['empleado_id' => 'id']],
            [['supervisor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supervisor::className(), 'targetAttribute' => ['supervisor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id:',
            'empleado_id' => 'Empleado Id:',
            'supervisor_id' => 'Supervisor Id:',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['id' => 'empleado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupervisor()
    {
        return $this->hasOne(Supervisor::className(), ['id' => 'supervisor_id']);
    }
}
