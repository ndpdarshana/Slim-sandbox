<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;

class PasswordController extends Controller{
  public function getChangePassword($request, $response){
    return $this->view->render($response, 'auth/password/change.twig');
  }

  public function postChangePassword(){

  }
}
