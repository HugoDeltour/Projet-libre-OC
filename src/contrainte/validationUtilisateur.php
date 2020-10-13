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

  public function validationMembre(parametre $post){
    foreach ($post->all() as $key => $value) {
      $this->validationChamps($key,$value);
    }
    return $this->errors;
  }

  private function validationChamps($name,$value){
    if($name==='pseudo'){
      $error=$this->validationPseudo($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='password'){
      $error=$this->validationPassword($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='nvPassword'){
      $error=$this->validationPassword($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='nvPassword2'){
      $error=$this->validationPassword($name,$value);
      $this->addError($name,$error);
    }
  }

  private function addError($name,$error){
    if($error){
      $this->errors+=[$name=>$error];
    }
  }

  private function validationPseudo($name,$value){
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

  private function validationPassword($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide($name,$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin($name,$value,2);
    }
    if($this->contrainte->longMax($name,$value,255)){
      return $this->contrainte->longMax($name,$value,255);
    }
  }

}

?>
