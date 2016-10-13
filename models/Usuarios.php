<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $email
 * @property string $password
 * @property string $rol
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'username', 'password','authKey'], 'required'],
            [['nombre', 'apellidos', 'username', 'password'], 'string', 'max' => 30],
            [['authKey'], 'char', 'max' => 50],
            [['rol'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'username' => 'Username',
            'password' => 'Password',
            'rol' => 'Rol',
            'authKey' => 'AuthKey',
        ];
    }
    public function getAuthKey()
    {
      return $this->authKey;
    }

    public function getId()
    {
      return $this->id;
    }

    public function validateAuthKey($authKey)
    {
      return $this->authKey === $authKey;
    }

    public static function findIdentity($id)
    {
      return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
      throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username)
    {
      return self::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
      return $this->password === $password;
    }
}
