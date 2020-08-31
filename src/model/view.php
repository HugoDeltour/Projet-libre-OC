<?php

namespace App\src\model;

use App\config\request;

/**
 * class view
 * @packages App\config\request
 * class permettant d'afficher les pages du blog
 */
class view{

  private $file;
  private $title;
  private $request;
  private $session;

  public function __construct(){
    $this->request=new request();
    $this->session=$this->request->getSession();
  }

  public function rendu($template, $data=[]){
    $this->file='../templates/'.$template.'.php';
    $content = $this->renduFichier($this->file, $data);
    $view = $this->renduFichier('../templates/base.php',[
      'title'=>$this->title,
      'content'=>$content,
      'session'=>$this->session
    ]);
    echo $view;
  }

  private function renduFichier($file, $data){
    if(file_exists($file)){
      extract($data);
      ob_start();
      require $file;
      return ob_get_clean();
    }
    header('Loccation: index.php?route=notFound');
  }

}

?>
