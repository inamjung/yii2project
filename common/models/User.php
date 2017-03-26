<?php

namespace common\models;
 
use dektrium\user\models\User as BaseUser;
 
class User extends BaseUser
{
    //เพิ่มมาใหม่
    const ROLE_USER = 10;
    const ROLE_MODERATOR = 20;
    const ROLE_ADMIN = 30;
    
    public function register()
    {
        if ($this->validate()) {
            $user = $this->module->manager->createUser([
                'scenario' => 'register',
                'email'    => $this->email,
                'username' => $this->username,
                'password' => $this->password,
                'role'=> self::ROLE_USER              
            ]);
 
            return $user->register();
        }
 
        return false;
    }
}
?>

