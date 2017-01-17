<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class PasswordController extends Controller{
  public function getChangePassword($request, $response){
    return $this->view->render($response, 'auth/password/change.twig');
  }

  public function postChangePassword($request, $response){
    $validation = $this->validator->validate($request, [
      'password_old' => v::noWhitespace()->notEmpty()->matchesPassword($this->auth->user()->password),
      'password_new' => v::noWhitespace()->notEmpty(),
    ]);

    if($validation->failed()){
      return $response->withRedirect($this->router->pathFor('auth.changepassword'));
    }

    $this->auth->user()->setPassword($request->getParam('password_new'));
    $this->flash->addMessage('global','Your password changed.');
    return $response->withRedirect($this->router->pathFor('home'));

    die('Change password');
  }
}
