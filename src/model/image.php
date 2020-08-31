<?php
  namespace App\src\model;

  class image{
    private $id_image;
    private $titre_image;
    private $nom_img_fichier;
    private $date_image;
    private $lieu_image;

    public function getId(){
      return $this->id_image;
    }

    public function setId($id_image)
    {
        $this->id_image = $id_image;
    }

    public function getTitre(){
      return $this->titre_image;
    }

    public function setTitre($titre_image)
    {
        $this->titre_image = $titre_image;
    }

    public function getNom(){
      return $this->nom_img_fichier;
    }

    public function setNom($nom_img_fichier)
    {
        $this->nom_img_fichier = $nom_img_fichier;
    }

    public function getDate(){
      return $this->date_image;
    }

    public function setDate($date_image)
    {
        $this->date_image = $date_image;
    }

    public function getLieu(){
      return $this->lieu_image;
    }

    public function setLieu($lieu_image)
    {
        $this->lieu_image = $lieu_image;
    }

  }
?>
