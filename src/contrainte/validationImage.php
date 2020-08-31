<?php

namespace App\src\contrainte;
use App\config\parametre;

/**
 * class validationImage
 * @packages App\config\parametre
 * class permettant la validation de certaine contrainte concernant l'ajout d'image'
 */
class validationImage extends validation{

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
    if($name==='titre_image'){
      $error=$this->checkTitre($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='nom_img_fichier') {
      $error=$this->checkText($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='date_image') {
      $error=$this->checkDate($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='lieu_image') {
      $error=$this->checkLieu($name,$value);
      $this->addError($name,$error);
    }
  }

  private function addError($name,$error){
    if($error){
      $this->errors+=[$name=>$error];
    }
  }

  private function checkTitre($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('titre',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('titre',$value,2);
    }
    if($this->contrainte->longMax($name,$value,255)){
      return $this->contrainte->longMax('titre',$value,255);
    }
  }

  private function checkText($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('text',$value);
    }
    if($this->contrainte->longMin($name,$value,10)){
      return $this->contrainte->longMin('text',$value,10);
    }
  }

  private function checkDate($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('date',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('date',$value,2);
    }
    if($this->contrainte->longMax($name,$value,255)){
      return $this->contrainte->longMax('date',$value,255);
    }
  }

  private function checkLieu($name,$value){
    if($this->contrainte->nonVide($name,$value)){
      return $this->contrainte->nonVide('lieu',$value);
    }
    if($this->contrainte->longMin($name,$value,2)){
      return $this->contrainte->longMin('lieu',$value,2);
    }
    if($this->contrainte->longMax($name,$value,255)){
      return $this->contrainte->longMax('lieu',$value,255);
    }
  }
}

?>
