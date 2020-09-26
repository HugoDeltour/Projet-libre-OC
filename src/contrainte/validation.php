<?php

namespace App\src\contrainte;
/**
 * class validation
 * class permettant de diriger vers la bonne validation
 */
class validation{

  public function validate($data,$name){
    if($name === 'image'){
      $validationImage = new validationImage();
      $errors = $validationImage->check($data);
      return $errors;
    }
    elseif ($name==='commentaire') {
      $validationCommentaire = new validationCommentaire();
      $errors = $validationCommentaire->check($data);
      return $errors;
    }
    elseif ($name==='utilisateur') {
      $validationUtilisateur = new validationUtilisateur();
      $errors = $validationUtilisateur->check($data);
      return $errors;
    }
    elseif ($name==='contact') {
      $validationContact = new validationContact();
      $errors = $validationContact->check($data);
      return $errors;
    }
  }

}

?>
