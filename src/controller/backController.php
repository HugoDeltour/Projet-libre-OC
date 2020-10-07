<?php

namespace App\src\controller;

use App\config\parametre;

class backController extends Controller{

  public function ajoutImage(parametre $post){
    if($post->get('submit')){
      $errors = $this->validation->validate($post,'image');
      if(!$errors){
        $file=$this->upload($post->get('categorie'));
        $this->imageDAO->ajoutimage($post,$file);
        $this->session->set('notification','L\'image a été ajouté !');
        header('Location: ../index.php');
      }
      return $this->view->rendu('ajout_image',[
        'post'=>$post,
        'errors'=>$errors
      ]);
    }
    return $this->view->rendu('ajout_image',[
      'post'=>$post,
    ]);
  }

  public function ajoutCarrousel(parametre $post){
    if($post->get('submit')){
      $errors = $this->validation->validate($post,'image');
      if(!$errors){
        $file=$this->upload('carrousel');
        $this->imageDAO->ajoutimage($post,$file);
        $this->session->set('notification','L\'image a été ajouté au carrousel !');
        header('Location: ../index.php');
      }
      return $this->view->rendu('ajout_carrousel',[
        'post'=>$post,
        'errors'=>$errors
      ]);
    }
    return $this->view->rendu('ajout_carrousel',[
      'post'=>$post,
    ]);
  }


  public function modifImage(parametre $post, $imgID){
    $image = $this->imageDAO->getimage($imgID);
    if($post->get('submit')){
      $errors = $this->validation->validate($post,'image');
      if(!$errors){
        $file=$this->upload($post->get('categorie'));
        $this->imageDAO->modifimage($post,$imgID,$file);
        $this->session->set('notification','L\'image a été modifiée !');
        header('Location: ../index.php');
      }
      return $this->view->rendu('modifImage',[
        'image'=>$image,
        'errors'=> $errors,
        'post'=>$post
      ]);
    }

    $post->set('id_image',$image->getId());
    $post->set('titre_image',$image->getTitre());
    $post->set('nom_img_fichier',$image->getNom());
    $post->set('date',$image->getDate());
    $post->set('lieu',$image->getLieu());
    $post->set('categorie',$image->getCategorie());

    return $this->view->rendu('modifImage',[
      'image'=>$image,
      'post'=>$post
    ]);
  }


  public function modifCarrousel(parametre $post){
    $image = $this->imageDAO->getCarrousel();
    $compte = $this->imageDAO->compteCarrousel();
    if($post->get('submit')){
      $errors = $this->validation->validate($post,'image');
      if(!$errors){
        $file=$this->upload('carousel');
        $this->imageDAO->modifimage($post,$imgID,$file);
      }

      return $this->view->rendu('modifCarrousel',[
        'compte'=>$compte,
        'image'=>$image,
        'errors'=> $errors,
        'post'=>$post
      ]);
    }

    return $this->view->rendu('modifCarrousel',[
      'compte'=>$compte,
      'image'=>$image,
      'post'=>$post
    ]);
  }

  public function modifProfil(parametre $post,$idUser){
    $user = $this->utilisateurDAO->getProfil($idUser);
    if($post->get('submit')){
      $errors = $this->validation->validate($post,'utilisateur');
      if(!$errors){
        $this->utilisateurDAO->modifPseudo($post,$idUser);
      }
      else{
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
          echo json_encode($errors);
          header('Content-Type: application/json');
          http_response_code(400);
          die();
        }
      }
    }

    $post->set('id_user',$user->getId());
    $post->set('pseudo',$user->getPseudo());

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    }else{
      return $this->view->rendu('modifProfil',[
        'post'=>$post
      ]);
    }
  }


  public function supprimerImage($ImgID){
    $this->imageDAO->supprimerimage($ImgID);
    $this->session->set('notification','L\'image a été supprimé');
    header('Location:../index.php');
  }

  public function deconnexion(){
    $this->session->arret();
    $this->session->depart();
    $this->session->set('notification','Au revoir');
    header('Location:../index.php');
  }

  public function administration(){
    return $this->view->rendu('administration',[]);
  }

  public function supprimerCommentaire($comID){
    $this->commentDAO->supprimerCommentaire($comID);
    $this->session->set('notification','Le commentaire a été supprimé');
    header('Location:../index.php');
  }

  public function nonSignalCommentaire($comID){
    $this->commentDAO->nonSignalCommentaire($comID);
    $this->session->set('notification','Le commentaire a été enlever des commentaires signalés');
    header('Location:../index.php');
  }

  public function modifPassword($post,$idUser){
    if($post->get('submit')){
      $result=$this->utilisateurDAO->getPassword($post,$idUser);
      $errors=$this->validation->validate($post,'utilisateur');
      if($result && $result['isPasswordOK'] && empty($errors)){
        if(strcmp($post->get('nvPassword'),$post->get('nvPassword2'))==0){
          $this->utilisateurDAO->modifPassword($post,$idUser);
          $this->session->set('notification','Mot de passe modifié');
          header('Location:../index.php');
        }
        else{
          $errors['nvPassword2']='<p>Le mot de passe ne correspond pas</p>';
        }
      }
      else {
        if(strcmp($post->get('nvPassword'),$post->get('nvPassword2'))!==0){
          $errors['nvPassword2']='<p>Le mot de passe ne correspond pas</p>';
        }
      }
      return $this->view->rendu('modifPassword',[
        'post'=>$post,
        'errors'=>$errors
      ]);
    }
    return $this->view->rendu('modifPassword',[
      'post'=>$post,
    ]);
  }

  public function modifImgCarrousel(parametre $post,$idImg){
    $image = $this->imageDAO->getImage($idImg);
    if($post->get('submit')){
      $errors = $this->validation->validate($post,'image');
      if(!$errors){
        $file=$this->upload('carrousel');
        $this->imageDAO->modifimage($post,$idImg,$file);
        $this->session->set('notification','Carrousel modifié');
        header('location:../index.php?route=modifCarrousel');
      }
      return $this->view->rendu('modifImgCarrousel',[
        'image'=>$image,
        'errors'=> $errors
      ]);
    }

    return $this->view->rendu('modifImgCarrousel',[
      'image'=>$image
    ]);
  }

  public function upload($categorie){
    $dossier = 'Photos/'.$categorie.'/';
    $fichier = basename($_FILES['nom_img_fichier']['name']);
    $taille_maxi = 10000000000000000;
    $taille = filesize($_FILES['nom_img_fichier']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg','.JPG');
    $extension = strrchr($_FILES['nom_img_fichier']['name'], '.');
    //Début des vérifications de sécurité...
    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
         $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
    }
    if($taille>$taille_maxi)
    {
         $erreur = 'Le fichier est trop gros...';
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
         //On formate le nom du fichier ici...
         $fichier = strtr($fichier,
              'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
              'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
         if(move_uploaded_file($_FILES['nom_img_fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
         {

              var_dump('Upload effectué avec succès !');
         }
         else //Sinon (la fonction renvoie FALSE).
         {
              var_dump('Echec de l\'upload !');
         }
    }
    else
    {
         var_dump($erreur);
    }

    return $_FILES['nom_img_fichier']['name'];
  }


}
?>
