<?php
$app->get('/home', 'HomeController:index')->setName('home');
$app->get('/readDb', 'HomeController:readDb');
$app->get('/createUser', 'HomeController:createUser');

$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthController:postSignUp');
