<?php

namespace App\src\contrainte;
use App\config\parametre;

/**
 * class validationContact
 * @packages App\config\parametre
 * class permettant la validation de certaine contrainte concernant le pseudo, le mail et le message que souhaite envoyer l'utilisateur
 */

class validationContact extends validation{

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
    elseif ($name==='email'){

      $error=$this->checkMail($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='message'){
      $error=$this->checkMessage($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='sujet'){
      $error=$this->checkSujet($name,$value);
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

  private function checkMail($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('E-mail',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('E-mail',$value,2);
    }
    if($this->contrainte->longMax($name,$value,255)){
      return $this->contrainte->longMax('E-mail',$value,255);
    }
  }

  private function checkMessage($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('message',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('message',$value,2);
    }
    if($this->contrainte->longMax($name,$value,255)){
      return $this->contrainte->longMax('message',$value,255);
    }
  }

  private function checkSujet($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('sujet',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('sujet',$value,2);
    }
    if($this->contrainte->longMax($name,$value,255)){
      return $this->contrainte->longMax('sujet',$value,255);
    }
  }

}

?>
