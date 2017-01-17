<?php
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$app->get('/home', 'HomeController:index')->setName('home');

$app->group('', function(){

  $this->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
  $this->post('/auth/signup', 'AuthController:postSignUp');

  $this->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
  $this->post('/auth/signin', 'AuthController:postSignIn');
})->add(new GuestMiddleware($container));

$app->get('/readDb', 'HomeController:readDb');
$app->get('/createUser', 'HomeController:createUser');

$app->group('', function(){

  $this->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');

  $this->get('/auth/passwordchange', 'PasswordController:getChangePassword')->setName('auth.changepassword');
  $this->post('/auth/passwordchange', 'PasswordController:postChangePassword');
})->add(new AuthMiddleware($container));
