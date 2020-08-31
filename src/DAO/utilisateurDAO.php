<?php

namespace App\src\DAO;

use App\config\parametre;

/**
 * class utilisateurDAO
 * @packages App\src\DAO
 * Requete SQL basé sur la table 'user'
 */
class utilisateurDAO extends DAO{

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

}
?>
