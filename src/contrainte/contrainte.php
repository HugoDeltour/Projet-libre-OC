<?php

namespace App\src\contrainte;
use \DateTime;
/**
 * class contrainte
 * class listant les différentes contraintes utilisées
 */
class contrainte{

  public function nonVide($name,$value){
    if(empty($value)){
      if($name === 'MotDePasse'){
        return '<p>Le champ mot de passe est vide</p>';
      }
      elseif($name==='nvMotDePasse'){
        return '<p>Le champ nouveau mot de passe est vide</p>';
      }
      elseif($name==='nvMotDePasse2'){
        return '<p>Le champ confirmation mot de passe est vide</p>';
      }
      else{
        return '<p>Le champ '.$name.' est vide</p>';
      }
    }
  }

  public function longMin($name, $value, $minLenght){
    if(strlen($value)<$minLenght){
      if($name === 'MotDePasse'){
        return '<p>Le champ mot de passe doit contenir au moins '.$minLenght.' caractères</p>';
      }
      elseif($name==='nvMotDePasse'){
        return '<p>Le champ nouveau mot de passe doit contenir au moins '.$minLenght.' caractères</p>';
      }
      elseif($name==='nvMotDePasse2'){
        return '<p>Le champ confirmation mot de passe doit contenir au moins '.$minLenght.' caractères</p>';
      }
      else{
        return '<p>Le champ '.$name.' doit contenir au moins '.$minLenght.' caractères</p>';
      }
    }
  }

  public function longMax($name, $value, $maxLenght){
    if(strlen($value)>$maxLenght){
      if($name === 'MotDePasse'){
        return '<p>Le champ mot de passe doit contenir au moins '.$maxLenght.' caractères</p>';
      }
      elseif($name==='nvMotDePasse'){
        return '<p>Le champ nouveau mot de passe doit contenir au moins '.$maxLenght.' caractères</p>';
      }
      elseif($name==='nvMotDePasse2'){
        return '<p>Le champ confirmation mot de passe doit contenir au moins '.$maxLenght.' caractères</p>';
      }
      else{
        return '<p>Le champ '.$name.' doit contenir au moins '.$maxLenght.' caractères</p>';
      }
    }
  }

  public function validateDate($value){
    if(!$this->isValid($value,'Y-m-d')){
      return '<p>La date saisi n\'est pas valide, veuillez essayer "AAAA-MM-DD"</p>';
    }
  }

  public function isValid($date, $format = 'Y-m-d'){
    $dt = DateTime::createFromFormat($format, $date);
    return $dt && $dt->format($format) === $date;
  }

}

 ?>
