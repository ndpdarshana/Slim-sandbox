<?php

namespace App\Auth;

use App\Models\User;

class Auth{
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
}
