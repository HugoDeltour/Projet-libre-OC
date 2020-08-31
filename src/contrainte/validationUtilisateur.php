<?php

namespace App\src\contrainte;
use App\config\parametre;

/**
 * class validationUtilisateur
 * @packages App\config\parametre
 * class permettant la validation de certaine contrainte concernant le pseudo et le mot de passe de l'utilisateur
 */

class validationUtilisateur extends validation{

  private $errors=[];
  private $contrainte;

  public function __construct(){
    $this->contrainte = new contrainte();
  }

  public function check(parametre $post){
    foreach ($post->all() as $key => $value) {
      $this->checkChamps($key,$value);
    }
    return $this->errors;
  }

  private function checkChamps($name,$value){
    if($name==='pseudo'){
      $error=$this->checkPseudo($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='password') {
      $error=$this->checkPassword($name,$value);
      $this->addError($name,$error);
    }
  }

  private function addError($name,$error){
    if($error){
      $this->errors+=[$name=>$error];
    }
  }

  private function checkPseudo($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('pseudo',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('pseudo',$value,2);
    }
    if($this->contrainte->longMax($name,$value,255)){
      return $this->contrainte->longMax('pseudo',$value,255);
    }
  }

  private function checkPassword($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('password',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('password',$value,2);
    }
    if($this->contrainte->longMax($name,$value,255)){
      return $this->contrainte->longMax('password',$value,255);
    }
  }

}

?>
