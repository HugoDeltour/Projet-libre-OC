<?php
namespace App\config;
use App\src\controller\frontController;
use App\src\controller\errorController;
use App\src\controller\backController;
use Exception;

/**
 * Class router servant à diriger le client vers la bonne page avec les informations demandées
 */
class router{

  private $frontController;
  private $backController;
  private $errorController;
  private $request;

  public function __construct(){
    $this->request= new request();
    $this->frontController = new frontController();
    $this->backController = new backController();
    $this->errorController = new errorController();
  }

  public function run(){
    $route = $this->request->getGet()->get('route');
    try{
      if(isset($route)){
        if($route==='image'){
          $this->frontController->imgSeul($this->request->getGet()->get('imgID'));
        }
        elseif ($route==='administration') {
          if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
            if(!preg_match("/mobile/i",$_SERVER['HTTP_USER_AGENT'])){
              $this->backController->administration();
            }
            else{
              $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
              header('Location:../index.php');
            }
          }else{
            $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
            header('Location:../index.php');
          }
        }
        elseif ($route==='ajoutImage') {
          if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
            if(!preg_match("/mobile/i",$_SERVER['HTTP_USER_AGENT'])){
              $this->backController->ajoutImage($this->request->getPost());
            }
            else{
              $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
              header('Location:../index.php');
            }
          }else{
            $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
            header('Location:../index.php');
          }
        }
        elseif ($route==='modifImage') {
          if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
            if(!preg_match("/mobile/i",$_SERVER['HTTP_USER_AGENT'])){
              $this->backController->modifImage($this->request->getPost(),$this->request->getGet()->get('imgID'));
            }
            else{
              $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
              header('Location:../index.php');
            }
          }else{
            $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
            header('Location:../index.php');
          }
        }
        elseif ($route==='supprimerImage') {
          if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
            $this->backController->supprimerImage($this->request->getGet()->get('imgID'));
          }else{
            $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
            header('Location:../index.php');
          }
        }
        elseif ($route==='ajoutCommentaire') {
          $this->frontController->ajoutCommentaire($this->request->getPost(),$this->request->getGet()->get('imgID'));
        }
        elseif ($route==='signalerCommentaire') {
          $this->frontController->signalerCommentaire($this->request->getGet()->get('commentaireID'));
        }
        elseif ($route==='inscription') {
          $this->frontController->inscription($this->request->getPost());
        }
        elseif ($route==='connexion') {
          $this->frontController->connexion($this->request->getPost());
        }
        elseif ($route==='deconnexion') {
          $this->backController->deconnexion();
        }
        elseif ($route==='commentairesSignales') {
          if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
            if(!preg_match("/mobile/i",$_SERVER['HTTP_USER_AGENT'])){
              $this->frontController->commentairesSignales();
            }
            else{
              $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
              header('Location:../index.php');
            }
          }else{
            $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
            header('Location:../index.php');
          }
        }
        elseif ($route==='supprimerCommentaire') {
          if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
            if(!preg_match("/mobile/i",$_SERVER['HTTP_USER_AGENT'])){
              $this->backController->supprimerCommentaire($this->request->getGet()->get('comID'));
            }
            else{
              $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
              header('Location:../index.php');
            }
          }else{
            $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
            header('Location:../index.php');
          }
        }
        elseif ($route==='nonSignalCommentaire') {
          if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
            if(!preg_match("/mobile/i",$_SERVER['HTTP_USER_AGENT'])){
              $this->backController->nonSignalCommentaire($this->request->getGet()->get('comID'));
            }
            else{
              $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
              header('Location:../index.php');
            }
          }else{
            $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
            header('Location:../index.php');
          }
        }
        elseif ($route==='portofolio') {
          $this->frontController->portofolio();
        }

        elseif ($route==='categorie') {
          $this->frontController->categorie($this->request->getGet()->get('categorie'));
        }
        elseif ($route==='contact'){
          $this->frontController->contact($this->request->getPost());
        }
        elseif ($route==='modifCarrousel') {
          if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
            if(!preg_match("/mobile/i",$_SERVER['HTTP_USER_AGENT'])){
              $this->backController->modifCarrousel($this->request->getpost());
            }
            else{
              $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
              header('Location:../index.php');
            }
          }else{
            $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
            header('Location:../index.php');
          }
        }
        elseif ($route==='ajoutCarrousel') {
          if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
            if(!preg_match("/mobile/i",$_SERVER['HTTP_USER_AGENT'])){
              $this->backController->ajoutCarrousel($this->request->getpost());
            }
            else{
              $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
              header('Location:../index.php');
            }
          }else{
            $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
            header('Location:../index.php');
          }
        }
        elseif ($route==='modifPassword') {
          if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
            $this->backController->modifPassword($this->request->getpost(),$this->request->getSession()->get('id'));
          }else{
            $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
            header('Location:../index.php');
          }
        }
        elseif ($route==='modifProfil') {
          if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
              $this->backController->modifProfil($this->request->getPost(),$this->request->getGet()->get('profilId'));
            }else{
              $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
              header('Location:../index.php');
            }
          }
          else{
            if(!empty($this->request->getSession()) && $this->request->getSession()->get('role')==='admin'){
              $this->backController->modifProfil($this->request->getPost(),$this->request->getGet()->get('profilId'));
            }else{
              $this->request->getSession()->set('echec','Vous n\'avez pas accès à cette page');
              header('Location:../index.php');
            }
          }
        }
        else{
          $this->errorController->errorNotFound();
        }
      }
      else{
        $this->frontController->home();
      }
    }
    catch(Exception $e){
      var_dump("".$e->getMessage());
      var_dump($this->request->getPost());
      $this->errorController->errorServer();
    }
  }
}

?>
