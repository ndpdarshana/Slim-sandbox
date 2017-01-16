<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use Respect\Validation\Validator as v;

class AuthController extends Controller{

  public function getSignUp($request, $response){
    return $this->view->render($response, 'auth/signup.twig');
  }

  public function postSignUp($request, $response){
    // var_dump($request->getParams());

    $validation = $this->validator->validate($request, [
      'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
      'name' => v::notEmpty()->alpha(),
      'password' => v::noWhitespace()->notEmpty(),
    ]);

    if($validation->failed()){
        return $response->withRedirect($this->router->pathFor('auth.signup'));
    }

    User::create([
      'email' => $request->getParam('email'),
      'name' => $request->getParam('name'),
      'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT, ['cost' => 10]),
    ]);

    return $response->withRedirect($this->router->pathFor('home'));
  }
}
