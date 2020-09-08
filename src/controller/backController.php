<?php

namespace App\src\controller;

use App\config\parametre;

class backController extends Controller{

  public function ajoutImage(parametre $post){
    $reqImg = $this->imageDAO->getimages();
    if($post->get('submit')){
      $errors = $this->validation->validate($post,'image');
      if(!$errors){
        $file=$this->upload($post->get('categorie'));
        $this->imageDAO->ajoutimage($post,$file);
        $this->session->set('ajout_image','L\'image a été ajouté !');
        header('Location: ../index.php');
      }
      return $this->view->rendu('ajout_image',[
        'post'=>$post,
        'reqImg'=>$reqImg,
        'errors'=>$errors
      ]);
    }
    return $this->view->rendu('ajout_image',[
      'post'=>$post,
      'reqImg'=>$reqImg
    ]);
  }

  public function modifImage(parametre $post, $imgID){
    $image = $this->imageDAO->getimage($imgID);
    $reqImg = $this->imageDAO->getimages();
    if($post->get('submit')){
      $errors = $this->validation->validate($post,'image');
      if(!$errors){
        $file=$this->upload($post->get('categorie'));
        $this->imageDAO->modifimage($post,$imgID,$file);
        $this->session->set('modif_image','L\'image a été modifié !');
        header('Location: ../index.php');
      }
      return $this->view->rendu('modif_image',[
        'image'=>$image,
        'reqImg'=>$reqImg,
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

    return $this->view->rendu('modif_image',[
      'image'=>$image,
      'reqImg'=>$reqImg,
      'post'=>$post
    ]);
  }

  public function supprimerImage($ImgID){
    $this->imageDAO->supprimerimage($ImgID);
    $this->session->set('supprimer_image','L\'image a été supprimé');
    header('Location:../index.php');
  }

  public function deconnexion(){
    $this->session->arret();
    $this->session->depart();
    $this->session->set('deconnexion','Au revoir');
    header('Location:../index.php');
  }

  public function administration(){
    $reqImg = $this->imageDAO->getimages();
    return $this->view->rendu('administration',[
      'reqImg'=>$reqImg
    ]);
  }

  public function supprimerCommentaire($comID){
    $this->commentDAO->supprimerCommentaire($comID);
    $this->session->set('supprimer_commentaire','Le commentaire a été supprimé');
    header('Location:../index.php');
  }

  public function nonSignalCommentaire($comID){
    $this->commentDAO->nonSignalCommentaire($comID);
    $this->session->set('signalCommentaire','Le commentaire a été enlever des commentaires signalés');
    header('Location:../index.php');
  }

  public function upload($categorie){
    $dossier = 'Photos/'.$categorie.'/';
    $fichier = basename($_FILES['nom_img_fichier']['name']);
    $taille_maxi = 100000;
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
         var_dump($fichier);
         $fichier = strtr($fichier,
              'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
              'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
         if(move_uploaded_file($_FILES['nom_img_fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
         {
              $this->session->set('uplaod','Upload effectué avec succès !');
         }
         else //Sinon (la fonction renvoie FALSE).
         {
              $this->session->set('upload','Echec de l\'upload !');
         }
    }
    else
    {
         echo $erreur;
    }

    return $_FILES['nom_img_fichier']['name'];
  }

}
?>
