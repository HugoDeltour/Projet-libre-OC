<?php

namespace App\config;

class parametre{
  private $parametre;

  public function __construct($parametre){
    $this->parametre=$parametre;
  }

  public function get($name){

    if(isset($this->parametre[$name])){
      return $this->parametre[$name];
    }
  }

  public function set($name,$value){
    $this->parametre[$name]=$value;
  }

  public function all(){
    return$this->parametre;
  }

}
?>
