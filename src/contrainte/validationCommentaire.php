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

  public function validationCom(parametre $post){
    foreach ($post->all() as $key => $value) {
      $this->validationChamps($key,$value);
    }
    return $this->errors;
  }

  private function ajoutErreur($name,$error){
    if($error){
      $this->errors+=[$name=>$error];
    }
  }

  private function validationChamps($name,$value){
    if($name==='pseudo'){
      $error=$this->validationPseudo($name,$value);
      $this->ajoutErreur($name,$error);
    }
    elseif ($name==='commentaire') {
      $error=$this->validationCommentaire($name,$value);
      $this->ajoutErreur($name,$error);
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

  private function validationCommentaire($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('commentaire',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('commentaire',$value,2);
    }
  }

}

?>
