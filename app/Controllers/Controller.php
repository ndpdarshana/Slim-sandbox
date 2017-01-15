<?php
namespace App\Controllers;

class Controller {
  protected $container;

  public function __construct($container){
    $this->container = $container;
  }

  //This method is for return any property that contain in container. In our case it's [view]
  public function __get($property){
    if($this->container->{$property}){
      return $this->container->{$property};
    }
  }
}
