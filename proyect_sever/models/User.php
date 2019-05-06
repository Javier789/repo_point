<?php

namespace app\models;

use \yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * @property type $id Description
 * @property type $username Description
 * @property type $password Description
 * @property type $authKey Description
 * @property type $accessToken Description
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface {

     public static function tableName()
    {
        return 'users';
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id) {
       return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null) {
     return static::findOne(['access_token' => $token]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId() {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey() {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return $this->password === $password;
    }
    
     public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
    /* Busca la identidad del usuario a través del username */
    public static function findByUsername($username)
    {
        $user = User::find()
                ->andWhere("username=:username", [":username" => $username])
                ->one();
        return $user;
    }
}
