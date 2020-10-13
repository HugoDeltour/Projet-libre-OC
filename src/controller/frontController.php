<?php

namespace App\src\controller;
use App\src\DAO\imageDAO;
use App\src\DAO\commentDAO;
use App\src\model\view;
use App\config\parametre;

/**
 * class frontController
 * @packages App\src\controller
 * Controlleur frontal permettant de faire l'appel des requetes SQL et de les afficher
 */
class frontController extends Controller{

  public function home(){
    $req = $this->imageDAO->getCarrousel();
    $compteCarrousel = $this->imageDAO->compteCarrousel();
    return $this->view->rendu('affichageAccueil',[
      'req'=>$req,
      'compteCarrousel'=>$compteCarrousel
    ]);
  }

  public function imgSeul($idImg){
    $req=$this->imageDAO->getImage($idImg);
    $comments = $this->commentDAO->getCommentsFromImage($idImg);
    return $this->view->rendu('imageSeul',[
      'req'=>$req,
      'comments'=>$comments
    ]);
  }

  public function ajoutCommentaire(parametre $post,$imgID){
    if($post->get('submit')){
      $errors=$this->validation->validation($post,'commentaire');
      if(!$errors){
        $this->commentDAO->ajoutCommentaire($post,$imgID);
        $this->session->set('notification','Le commentaire a été ajouté');
        header('Location:../index.php?route=image&imgID='.$imgID);
      }
      $req=$this->imageDAO->getImage($imgID);
      $comments = $this->commentDAO->getCommentsFromImage($imgID);
      return $this->view->rendu('imageSeul',[
        'req'=>$req,
        'comments'=>$comments,
        'post'=>$post,
        'errors'=>$errors
      ]);
    }
  }

  public function signalerCommentaire($commentID){
    $this->commentDAO->signalerCommentaire($commentID);
    $this->session->set('notification','Le commentaire a été signalé');
    header('Location:../index.php');
  }

  public function inscription(parametre $post){
    if($post->get('submit')){
      $errors=$this->validation->validation($post,'utilisateur');
      if($this->utilisateurDAO->checkUtilisateur($post)){
        $errors['pseudo']=$this->utilisateurDAO->checkUtilisateur($post);
      }
      if(!$errors){
        $this->utilisateurDAO->inscription($post);
        $this->session->set('notification','Vous êtes inscrit !');
        header('Location:../index.php');
      }
      return $this->view->rendu('inscription',[
        'post'=>$post,
        'errors'=>$errors
      ]);
    }
    return $this->view->rendu('inscription',[
      'post'=>$post
    ]);
  }

  public function connexion(parametre $post){
    if($post->get('submit')){
      $result=$this->utilisateurDAO->connexion($post);
      $errors=$this->validation->validation($post,'utilisateur');
      if($result && $result['isPasswordOK']){
        $this->session->set('notification','Bienvenue');
        $this->session->set('id',$result['result']['id_user']);
        $this->session->set('role',$result['result']['nom_role']);
        $this->session->set('pseudo',$post->get('pseudo'));
        header('Location:../index.php');
      }
      else {
        return $this->view->rendu('connexion',[
          'post'=>$post,
          'errors'=>$errors
        ]);
      }
    }
    return $this->view->rendu('connexion',[
      'post'=>$post
    ]);
  }

  public function commentairesSignales(){
    $reqComSignal = $this->commentDAO->commentairesSignales();
    return $this->view->rendu('commentairesSignales',[
      'reqComSignal'=>$reqComSignal
    ]);
  }

  public function portofolio(){
    return $this->view->rendu('portofolio');
  }

  public function categorie($categorie){
    $req = $this->imageDAO->getcategorie($categorie);
    return $this->view->rendu('categorie',['req'=>$req]);
  }

  public function contact(parametre $post){
    if($post->get('submit')){
      $result=$this->utilisateurDAO->connexion($post);
      $errors=$this->validation->validation($post,'contact');
      if(!$errors){
        mail('libre@dixideo.fr',$post->get('sujet'),strip_tags($post->get('message'),'<br>'),'From:'.$post->get('email'));
        $this->session->set('notification','E-mail envoyé');
        header('Location:../index.php');
      }
      else {
        return $this->view->rendu('contact',[
          'post'=>$post,
          'errors'=>$errors
        ]);
      }
    }
    return $this->view->rendu('contact',[
      'post'=>$post
    ]);
  }

}

?>
