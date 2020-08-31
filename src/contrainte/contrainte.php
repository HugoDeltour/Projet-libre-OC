<?php

namespace App\src\contrainte;
/**
 * class contrainte
 * class listant les différentes contraintes utilisées
 */
class contrainte{

  public function nonVide($name,$value){
    if(empty($value)){
      return '<p>Le champ '.$name.' est vide</p>';
    }
  }

  public function longMin($name, $value, $minLenght){
    if(strlen($value)<$minLenght){
      return '<p>Le champ '.$name.' doit contenir au moins '.$minLenght.' caractères</p>';
    }
  }

  public function longMax($name, $value, $maxLenght){
    if(strlen($value)>$maxLenght){
      return '<p>Le champ '.$name.' doit contenir moins de '.$maxLenght.' caractères</p>';
    }
  }

}

 ?>
