<?php
use App\Middleware\AuthMiddleware;

$app->get('/home', 'HomeController:index')->setName('home');
$app->get('/readDb', 'HomeController:readDb');
$app->get('/createUser', 'HomeController:createUser');

$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthController:postSignUp');

$app->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
$app->post('/auth/signin', 'AuthController:postSignIn');

$app->group('', function(){

  $this->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');

  $this->get('/auth/passwordchange', 'PasswordController:getChangePassword')->setName('auth.changepassword');
  $this->post('/auth/passwordchange', 'PasswordController:postChangePassword');
})->add(new AuthMiddleware($container));
