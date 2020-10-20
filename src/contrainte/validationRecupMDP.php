<?php

namespace App\src\contrainte;
use App\config\parametre;

/**
 * class validationContact
 * @packages App\config\parametre
 * class permettant la validation de certaine contrainte concernant le pseudo, le mail et le message que souhaite envoyer l'utilisateur
 */

class validationRecupMdp extends validation{

  private $errors=[];
  private $contrainte;

  public function __construct(){
    $this->contrainte = new contrainte();
  }

  public function validationDemande(parametre $post){
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
    elseif ($name==='email'){
      $error=$this->validationMail($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='code'){
      $error=$this->validationCode($name,$value);
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

  private function validationMail($name,$value){
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

  private function validationCode($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('Code',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('Code',$value,2);
    }
    if($this->contrainte->longMax($name,$value,8)){
      return $this->contrainte->longMax('Code',$value,255);
    }
  }


}

?>
