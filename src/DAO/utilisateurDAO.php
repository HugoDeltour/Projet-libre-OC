<?php

namespace App\src\DAO;

use App\config\parametre;
use App\src\model\utilisateur;

/**
 * class utilisateurDAO
 * @packages App\src\DAO
 * Requete SQL basé sur la table 'user'
 */
class utilisateurDAO extends DAO{

  private function buildObjectUser($row){
    $user = new utilisateur();
    $user->setId($row['id_user']);
    $user->setPseudo($row['pseudo']);
    $user->setPassword($row['password']);
    return $user;
  }

  public function inscription(parametre $post){
    $this->validationUtilisateur($post);
    $sql = 'INSERT INTO user (pseudo,password,role_id) VALUES (?,?,?)';
    $this->requete($sql,[$post->get('pseudo'),password_hash($post->get('password'),PASSWORD_BCRYPT),2]);
  }

  public function validationUtilisateur(parametre $post){
    $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo=?';
    $result = $this->requete($sql,[$post->get('pseudo')]);
    $isUnique=$result->fetchColumn();
    if($isUnique){
      return '<p>Pseudo déjà existant</p>';
    }
  }

  public function connexion(parametre $post){
    $sql = 'SELECT user.id_user,user.password,role.nom_role FROM user INNER JOIN role ON role.id_role = user.role_id WHERE pseudo =?';
    $data=$this->requete($sql,[$post->get('pseudo')]);
    $result=$data->fetch();
    $isPasswordOK = password_verify($post->get('password'),$result['password']);
    return ['result'=>$result,'isPasswordOK'=>$isPasswordOK];
  }

  public function getProfil($idUser){
    $sql = 'SELECT id_user, pseudo, password FROM user WHERE id_user=?';
    $result = $this->requete($sql,[$idUser]);
    $user = $result->fetch();
		$result->closeCursor();
		return $this->buildObjectUser($user);
  }

  public function modifPseudo(parametre $post, $idUser){
		$sql = 'UPDATE user SET pseudo=:pseudo WHERE id_user =:user_id ';
    $this->requete($sql,[
      'pseudo'=>$post->get('pseudo'),
      'user_id'=>$idUser
    ]);
	}

  public function modifMotDepasse(parametre $post, $idUser){
    $sql = 'UPDATE user SET password=:password WHERE id_user =:user_id ';
    $this->requete($sql,[
      'password'=>password_hash($post->get('nvMotDePasse'),PASSWORD_BCRYPT),
      'user_id'=>$idUser
    ]);
  }

  public function insertRecup(parametre $post,$code){
    $sql = 'INSERT INTO recuperation (pseudo,code_recup) VALUES (?,?)';
    $this->requete($sql,[$post->get('pseudo'),$code]);
  }

  public function existRecup(parametre $post){
    $sql = 'SELECT id_recup FROM recuperation WHERE pseudo = ?';
    return $this->requete($sql,[$post->get('pseudo')]);
  }

  public function miseAJourRecup(parametre $post,$code){
    $sql = 'UPDATE recuperation SET code_recup = ? WHERE pseudo = ?';
    $this->requete($sql,[$code,$post->get('pseudo')]);
  }

  public function validationCode(parametre $post,$code){
    $sql = 'SELECT id_recup FROM recuperation WHERE code_recup = ? AND pseudo = ?';
    $requete = $this->requete($sql,[$code,$post->get('pseudo')]);
    return $requete->rowCount();
  }

  public function confirmCode(parametre $post){
    $sql = 'UPDATE recuperation SET confirmation = 1 WHERE pseudo = ?';
    $this->requete($sql,[$post->get('pseudo')]);
  }

  public function modifMotDePassePseudo(parametre $post, $pseudo){
    $sql = 'UPDATE user SET password=:password WHERE pseudo =:pseudo ';
    $this->requete($sql,[
      'password'=>password_hash($post->get('nvMotDePasse'),PASSWORD_BCRYPT),
      'pseudo'=>$pseudo
    ]);
  }
  public function supRecup($pseudo){
    $sql = 'DELETE FROM recuperation WHERE pseudo = ?';
    $this->requete($sql,[$pseudo]);
  }

}
?>
