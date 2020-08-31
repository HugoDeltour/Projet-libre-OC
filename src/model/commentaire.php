<?php

namespace App\src\model;

class commentaire{

  private $id;
  private $pseudo;
  private $comment;
  private $date;
  private $signal;

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getPseudo(){
    return $this->pseudo;
  }

  public function setPseudo($pseudo){
    $this->pseudo = $pseudo;
  }

  public function getComment(){
    return $this->comment;
  }

  public function setComment($comment){
    $this->comment = $comment;
  }

  public function getDate(){
    return $this->date;
  }

  public function setDate($date){
    $this->date = $date;
  }

  public function isSignal(){
    return $this->signal;
  }

  public function setSignal($signal){
    $this->signal=$signal;
  }

}

?>
