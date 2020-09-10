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
    $this->checkUtilisateur($post);
    $sql = 'INSERT INTO user (pseudo,password,role_id) VALUES (?,?,?)';
    $this->createQuery($sql,[$post->get('pseudo'),password_hash($post->get('password'),PASSWORD_BCRYPT),2]);
  }

  public function checkUtilisateur(parametre $post){
    $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo=?';
    $result = $this->createQuery($sql,[$post->get('pseudo')]);
    $isUnique=$result->fetchColumn();
    if($isUnique){
      return '<p>Pseudo déjà existant</p>';
    }
  }

  public function connexion(parametre $post){
    $sql = 'SELECT user.id_user,user.password,role.nom_role FROM user INNER JOIN role ON role.id_role = user.role_id WHERE pseudo =?';
    $data=$this->createQuery($sql,[$post->get('pseudo')]);
    $result=$data->fetch();
    $isPasswordOK = password_verify($post->get('password'),$result['password']);
    return ['result'=>$result,'isPasswordOK'=>$isPasswordOK];
  }

  public function getProfil($idUser){
    $sql = 'SELECT id_user, pseudo, password FROM user WHERE id_user=?';
    $result = $this->createQuery($sql,[$idUser]);
    $user = $result->fetch();
		$result->closeCursor();
		return $this->buildObjectUser($user);
  }

  public function modifProfil(parametre $post, $idUser){
		$sql = 'UPDATE user SET pseudo=:pseudo,password=:password WHERE id_user =:user_id ';
    $this->createQuery($sql,[
      'pseudo'=>$post->get('pseudo'),
      'password'=>password_hash($post->get('password'),PASSWORD_BCRYPT),
      'user_id'=>$idUser
    ]);
	}

}
?>
