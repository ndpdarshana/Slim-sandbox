<?php

namespace App\Auth;

use App\Models\User;

class Auth{

  public function user(){
    if(isset($_SESSION['user'])){
      return User::find($_SESSION['user']);
    }else{
      return null;
    }
  }

  public function check(){
    return isset($_SESSION['user']);
  }

  public function attempt($email, $password){
    //Grab the user by email
    $user = User::where('email', $email)->first();

    if(!$user){
      return false;
    }

    if(password_verify($password, $user->password)){
      $_SESSION['user'] = $user->id;
      return true;
    }

    return false;
  }

  public function signout(){
    unset($_SESSION['user']);
  }
}
