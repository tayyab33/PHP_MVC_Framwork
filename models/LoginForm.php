<?php

namespace app\models;
use app\core\Model;
use app\models\User;
use app\core\Application;

class LoginForm extends Model 
{
  public string $email = '';
  public string $password = ''; 
  public function rules(): array 
  {
  	return [
  		  'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
  		  'password' => [self::RULE_REQUIRED]
  	];
  }
  public function labels() : array 
     { 
           return [
                    'email' => 'your email',
                    'password' => 'Password'
           ];
     }
   public function login(){
       $user = (new User)->findOne(['email' => $this->email]);
      // $user =  User::findOne(['email' => $this->email]);
      if(!$user) { $this->add_Error('email', 'User does not exist with this email'); return false;}
      if(password_verify($this->password, $user->password)){
        $this->add_Error('password', 'Password is incorrect'); return false;
}
     
       return Application::$app->login($user);
      
      
   }
}


?>