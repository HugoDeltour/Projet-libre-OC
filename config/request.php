<?php

namespace App\config;

class request{
  private $get;
  private $post;
  private $session;

  public function __construct(){
    $this->get = new parametre($_GET);
    $this->post = new parametre($_POST);
    $this->session = new session($_SESSION);
  }

  public function getGet(){
    return $this->get;
  }

  public function getPost(){
    return $this->post;
  }

  public function getSession(){
    return $this->session;
  }

}

?>
