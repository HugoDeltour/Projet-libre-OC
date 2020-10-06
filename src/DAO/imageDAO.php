<?php

namespace App\src\DAO;

use App\config\parametre;
use App\src\model\image;

/**
 * class imageDAO
 * @packages App\src\DAO
 * Requete SQL basé sur la table 'image'
 */
class imageDAO extends DAO{

	private function buildObjectImage($row){
		$image = new image();
		$image->setId($row['id_image']);
		$image->setTitre($row['titre_image']);
		$image->setNom($row['nom_img_fichier']);
		$image->setDate($row['date_image']);
		$image->setLieu($row['lieu_image']);
		$image->setCategorie($row['categorie']);
		$image->setAlt($row['alter_img']);
		return $image;
	}

	public function getImages(){
		$sql='SELECT id_image, titre_image, nom_img_fichier, date_image, lieu_image, categorie, alter_img FROM image ORDER BY id_image';
		$result = $this->createQuery($sql);
		$img=[];
		foreach ($result as $row) {
			$idImg=$row['id_image'];
			$img[$idImg]=$this->buildObjectImage($row);
		}
		$result->closeCursor();
		return $img;
	}

	public function getImage($imgID){
		$sql='SELECT id_image, titre_image, nom_img_fichier, date_image, lieu_image, categorie, alter_img FROM image WHERE id_image = ?';
		$result= $this->createQuery($sql,[$imgID]);
		$img = $result->fetch();
		$result->closeCursor();
		return $this->buildObjectImage($img);
	}

	public function ajoutImage(parametre $img,$file){
		$sql = 'INSERT INTO image (titre_image, nom_img_fichier, date_image, lieu_image, categorie, alter_img) VALUES(?,?,?,?,?)';
		$this->createQuery($sql, [$img->get('titre_image'),$file,$img->get('date_image'),$img->get('lieu_image'),$img->get('categorie'),$img->get('alt')]);
	}

	public function modifImage(parametre $post, $imgID,$file){
		$sql = 'UPDATE image SET titre_image=:titre, nom_img_fichier=:nom, date_image=:dateImg, lieu_image=:lieu, categorie=:categorie, alter_img=:alt WHERE id_image =:imgID ';
		$this->createQuery($sql,[
			'titre'=> $post->get('titre_image'),
			'nom'=> $file,
			'dateImg'=> $post->get('date_image'),
			'lieu'=> $post->get('lieu_image'),
			'categorie'=>$post->get('categorie'),
			'alt'=>$post->get('alt'),
			'imgID'=> $imgID
		]);
	}

	public function supprimerImage($imgID){
		$sql = 'DELETE FROM commentaire WHERE commentaire_id_image=?';
		$this->createQuery($sql,[$imgID]);
		$sql = 'DELETE FROM image WHERE id_image=?';
		$this->createQuery($sql,[$imgID]);
	}

	public function getCategorie($categorie){
		$sql ='SELECT id_image, titre_image, nom_img_fichier, date_image, lieu_image, categorie, alter_img FROM image WHERE categorie=?';
		$result = $this->createQuery($sql,[$categorie]);
		$img=[];
		foreach ($result as $row) {
			$id_img = $row['id_image'];
			$img[$id_img]=$this->buildObjectImage($row);
		}
		$result->closeCursor();
		return $img;
	}

	public function getCarrousel(){
		$sql='SELECT id_image, titre_image, nom_img_fichier, date_image, lieu_image, categorie, alter_img FROM image WHERE categorie=?';
		$result = $this->createQuery($sql,['carrousel']);
		$img=[];
		$idImg=0;
		foreach ($result as $row) {
			$img[$idImg]=$this->buildObjectImage($row);
			$idImg++;
		}
		$result->closeCursor();
		return $img;
	}

	public function compteCarrousel(){
		$sql='SELECT COUNT(*) FROM image WHERE categorie=\'carrousel\'';
		$result = $this->createQuery($sql);
		$compte = $result->fetchColumn();
		$result->closeCursor();
		return $compte;
	}

}
?>
