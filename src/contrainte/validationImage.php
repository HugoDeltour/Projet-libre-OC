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

  public function validationImg(parametre $post){
    foreach ($post->all() as $key => $value) {
      $this->validationChamps($key,$value);
    }
    return $this->errors;
  }

  private function validationChamps($name,$value){
    if($name==='titre_image'){
      $error=$this->validationTitre($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='MAX_FILE_SIZE') {
      $error=$this->validationName();
      $this->addError('nom_img_fichier',$error);
    }
    elseif ($name==='date_image') {
      $error=$this->validationDate($name,$value);
      $this->addError($name,$error);
    }
    elseif ($name==='lieu_image') {
      $error=$this->validationLieu($name,$value);
      $this->addError($name,$error);
    }
    elseif($name==='categorie'){
      $error=$this->validationCategorie($name,$value);
      $this->addError($name,$error);
    }
    elseif($name==='alt'){
      $error=$this->validationAlt($name,$value);
      $this->addError($name,$error);
    }
  }

  private function addError($name,$error){
    if($error){
      $this->errors+=[$name=>$error];
    }
  }

  private function validationTitre($name,$value){
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

  private function validationName(){
    if(empty($_FILES['nom_img_fichier']['name'])){
      return '<p>Fichier non sélectionné</p>';
    }
  }

  private function validationDate($name,$value){
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

  private function validationLieu($name,$value){
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

  private function validationCategorie($name,$value){
    if($value === 'Veuillez selectionner une option'){
      $value = '<p>Veuillez sélectionner une catégorie valide !</p>';
      return $value;
    }
  }

  private function validationAlt($name,$value){
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
