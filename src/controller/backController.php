<?php

namespace App\src\controller;

use App\config\parametre;

class backController extends Controller{

  public function ajoutImage(parametre $post){
    $reqImg = $this->imageDAO->getimages();
    if($post->get('submit')){
      $errors = $this->validation->validate($post,'image');
      if(!$errors){
        $this->imageDAO->ajoutimage($post);
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

  public function modifImage(parametre $post, $ImgID){
    $image = $this->imageDAO->getimage($ImgID);
    $reqImg = $this->imageDAO->getimages();
    if($post->get('submit')){
      $errors = $this->validation->validate($post,'image');
      if(!$errors){
        $this->imageDAO->modifimage($post,$ImgID);
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
    $post->set('titre_image',$image->getTitle());
    $post->set('text_image',$image->getText());
    $post->set('auteur',$image->getAuthor());

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

}
?>
