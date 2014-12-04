<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
    
    /**
     * @param type $login
     * @return boolean
     */
    public static function isUserExist($login) {
        $user = User::find()->where(['login' => $login])->one();
        if(isset($user) && $user != null) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function isConnected() {
        $session = Yii::$app->session;
        if($session->has('connected') && $session->get('connected')) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @return User
     */
    public static function getUsers() {
        return User::find()->all();
    }
    
    /**
     * 
     * @param type $login
     * @param type $pwd
     * @return User || null
     */
    public static function getUserByLoginAndPassword($login, $pwd) {
        $user = User::find()->where(['login' => $login, 'password' => $pwd])->one();
        if(isset($user) && $user != null) {
            return $user;
        } else {
            return null;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login'], 'string', 'max' => 128],
            [['password'], 'string', 'max' => 256],
            [['login'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }
    
    
}
