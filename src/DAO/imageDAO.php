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
		return $image;
	}

	public function getImages(){
		$sql='SELECT id_image, titre_image, nom_img_fichier, date_image, lieu_image FROM image';
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
		$sql='SELECT id_image, titre_image, nom_img_fichier, date_image, lieu_image FROM image WHERE id_image = ?';
		$result= $this->createQuery($sql,[$imgID]);
		$img = $result->fetch();
		$result->closeCursor();
		return $this->buildObjectImage($img);
	}

	public function ajoutImage(parametre $img){
		$sql = 'INSERT INTO image (titre_image, nom_img_fichier, date_image, lieu_image) VALUES(?,?,?,?)';
		$this->createQuery($sql, [$img->get('titre_image'),$img->get('nom_img_fichier'),$img->get('date_image'),$img->get('lieu_image')]);
	}

	public function modifImage(parametre $post, $imgID){
		$sql = 'UPDATE image SET titre_imagee=:titre, nom_img_fichier=:nom, date_image=:dateImg, lieu_image=:lieu WHERE id_image =:imgID ';
		$this->createQuery($sql,[
			'titre'=> $post->get('titre_image'),
			'nom'=> $post->get('nom_img_fichier'),
			'dateImg'=> $post->get('date_image'),
			'lieu'=> $post->get('lieu_image'),
			'chapID'=> $imgID
		]);
	}

	public function supprimerImage($imgID){
		$sql = 'DELETE FROM commentaire WHERE commentaire_id_image=?';
		$this->createQuery($sql,[$imgID]);
		$sql = 'DELETE FROM image WHERE id_image=?';
		$this->createQuery($sql,[$imgID]);
	}

}
?>
