<?php

namespace App\src\DAO;
use App\config\parametre;
use App\src\model\commentaire;

/**
 * class commentDAO
 * @packages App\src\DAO
 * Requete SQL basé sur la table 'commentaire'
 */
class commentDAO extends DAO{

  private function buildObjectComment($row){
    $comment = new commentaire();
    $comment->setId($row['id_commentaire']);
    $comment->setpseudo($row['pseudo']);
    $comment->setComment($row['text_commentaire']);
    $comment->setDate($row['date_creation']);
    $comment->setSignal($row['signaler']);
    return $comment;
  }

  public function getCommentsFromImage($imageId)
  {
      $sql = 'SELECT id_commentaire, pseudo, text_commentaire, date_creation, signaler, commentaire_id_image FROM commentaire WHERE commentaire_id_image = ? ORDER BY date_creation DESC';
      $result = $this->requete($sql,[$imageId]);
      $comments=[];
      foreach($result as $row){
        $idComment = $row['id_commentaire'];
        $comments[$idComment] = $this->buildObjectComment($row);
      }
      $result->closeCursor();
      return $comments;
  }

  public function ajoutCommentaire(parametre $post,$imgID){
    $sql='INSERT INTO commentaire (pseudo,text_commentaire,date_creation,signaler,commentaire_id_image) VALUES (?,?,NOW(),?,?)';
    $this->requete($sql,[$post->get('pseudo'),$post->get('commentaire'),0,$imgID]);
  }

  public function signalerCommentaire($commentID){
    $sql = 'UPDATE commentaire SET signaler=? WHERE id_commentaire=?';
    $this->requete($sql,[1,$commentID]);
  }

  public function supprimeCommentaire($commentID){
    $sql = 'DELETE FROM commentaire WHERE id_commentaire=?';
    $this->requete($sql,[$commentID]);
  }

  public function commentairesSignales(){
    $sql = 'SELECT id_commentaire, pseudo, text_commentaire, date_creation, signaler, commentaire_id_image FROM commentaire WHERE signaler=?';
    $result = $this->requete($sql,[1]);
    $comments=[];
    foreach($result as $row){
      $idComment = $row['id_commentaire'];
      $comments[$idComment] = $this->buildObjectComment($row);
    }
    $result->closeCursor();
    return $comments;
  }

	public function supprimerCommentaire($comID){
		$sql = 'DELETE FROM commentaire WHERE id_commentaire=?';
		$this->requete($sql,[$comID]);
	}

  public function nonSignalCommentaire($comID){
    $sql = 'UPDATE commentaire SET signaler=0 WHERE id_commentaire=?';
    $this->requete($sql,[$comID]);
  }


}

?>
