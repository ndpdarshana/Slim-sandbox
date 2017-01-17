<?php
namespace App\Controllers;

use App\Models\User;
use Slim\Views\twig as View;

class HomeController extends Controller{

  public function index($request, $response){
    $this->flash->addMessage('global', 'test Flash Message');
    return $this->view->render($response, 'home.twig');
  }

  public function readDb($request, $response){
    // $user = $this->db->table('user')->find(1);
    // var_dump($user);
    // var_dump($user->email);

    $user = User::where('email', 'ndp.mymail@gmail.com')->first();
    var_dump($user);
    var_dump($user->name);
    die();
    return $this->view->render($response, 'home.twig');
  }

  public function createUser($request, $response){
    User::create([
      'name' => 'Gregson Alexander',
      'email' => 'g.alex@gmail.com',
      'password' => '123'
    ]);
    return $this->view->render($response, 'home.twig');
  }
}
