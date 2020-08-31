<?php

namespace App\src\controller;

/**
 * class errorController
 * @packages App\src\controller
 * Controlleur permettant d'afficher les potentielles erreurs
 */
class errorController extends Controller{

  public function errorNotFound(){
    require '../templates/error404.php';
  }

  public function errorServer(){
    require '../templates/error500.php';
  }

}

?>
