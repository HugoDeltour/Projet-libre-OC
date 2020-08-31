<?php

namespace app\config;

class session{
  private $session;

  public function __construct($session){
      $this->session = $session;
  }

  public function set($name,$value){
    $_SESSION[$name]=$value;
  }

  public function get($name){
    if(isset($_SESSION[$name])){
      return $_SESSION[$name];
    }
  }

  public function display($name){
    if(isset($_SESSION[$name])){
      $cle = $this->get($name);
      $this->supprime($name);
      return $cle;
    }
  }

  public function supprime($name){
    unset($_SESSION[$name]);
  }

  public function depart(){
    session_start();
  }

  public function arret(){
    session_destroy();
  }

}

?>
