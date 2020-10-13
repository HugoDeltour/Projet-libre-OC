<?php

namespace App\src\contrainte;
/**
 * class validation
 * class permettant de diriger vers la bonne validation
 */
class validation{

  public function validation($data,$name){
    if($name === 'image'){
      $validationImage = new validationImage();
      $errors = $validationImage->validationImg($data);
      return $errors;
    }
    elseif ($name==='commentaire') {
      $validationCommentaire = new validationCommentaire();
      $errors = $validationCommentaire->validationCom($data);
      return $errors;
    }
    elseif ($name==='utilisateur') {
      $validationUtilisateur = new validationUtilisateur();
      $errors = $validationUtilisateur->validationMembre($data);
      return $errors;
    }
    elseif ($name==='contact') {
      $validationContact = new validationContact();
      $errors = $validationContact->validationDemande($data);
      return $errors;
    }
  }

}

?>
