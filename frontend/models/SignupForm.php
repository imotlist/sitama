<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use backend\models\Kelompoktani;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $KELOMPOKTANI_ID;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Nama Ini Sudah Digunakan.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['KELOMPOKTANI_ID', 'string', 'max' => 20],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email Ini Sudah Digunakan.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->KELOMPOKTANI_ID = $this->KELOMPOKTANI_ID;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }

    //   /**
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getKELOMPOKTANI()
    // {
    //     return $this->hasOne(Kelompoktani::className(), ['KELOMPOKTANI_ID' => 'KELOMPOKTANI_ID']);
    // }

}
