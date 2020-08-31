<?php

namespace App\src\contrainte;
use App\config\parametre;

/**
 * class validationCommentaire
 * @packages App\config\parametre
 * class permettant la validation de certaine contrainte concernant les commentaires
 */

class validationCommentaire extends validation{

  private $errors = [];
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
    elseif ($name==='commentaire') {
      $error=$this->checkCommentaire($name,$value);
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

  private function checkCommentaire($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('commentaire',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('commentaire',$value,2);
    }
  }

}

?>
