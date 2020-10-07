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
    elseif ($name==='MAX_FILE_SIZE') {
      $error=$this->checkName();
      $this->addError('nom_img_fichier',$error);
    }
    elseif ($name==='date_image') {
      $error=$this->checkDate($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='lieu_image') {
      $error=$this->checkLieu($name,$value);
      $this->addError($name,$error);
    }
    elseif($name==='categorie'){
      $error=$this->checkCategorie($name,$value);
      $this->addError($name,$error);
    }
    elseif($name==='alt'){
      $error=$this->checkAlt($name,$value);
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

  private function checkName(){
    if(empty($_FILES['nom_img_fichier']['name'])){
      return '<p>Fichier non sélectionné</p>';
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
    if($this->contrainte->validateDate($value)){
      return $this->contrainte->validateDate($value);
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

  private function checkCategorie($name,$value){
    if($value === 'Veuillez selectionner une option'){
      $value = '<p>Veuillez sélectionner une catégorie valide !</p>';
      return $value;
    }
  }

  private function checkAlt($name,$value){
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
