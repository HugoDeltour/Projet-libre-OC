<?php
  $this->title = "Modification du carrousel";
  require('menu.php');
  if(!empty($this->session->get('notification'))){
    ?>
    <div id="notification" class="alert alert-success alert-dismissible fade show" role="alert">
       <h5 class="alert-heading">
      <?= $this->session->display('notification');?>
      </h5>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <?php
  } ?>
  <?php
  if(!empty($this->session->get('echec'))){
    ?>
      <div id="notification" class="alert alert-danger alert-dismissible fade show" role="alert">
       <h5 class="alert-heading">
      <?= $this->session->display('echec');?>
      </h5>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <?php
  }
  ?>
  <h1>Modification du carrousel</h1></br>
<div id="parent" class="row justify-content-center">
  <?php for($i=0;$i<$compte;$i++){
    ?>
    <div class="card text-blue center-block">
    <a href="./index.php?route=modifImgCarrousel&idImg=<?=$image[$i]->getId()?>">
      <img class="card-img" src="../Photos/<?= $image[$i]->getCategorie()?>/<?= $image[$i]->getNom()?>" alt="Image Protofolio Mariage">
    </a>
    </div>
    <?php
  }?>
  <div id="ajouterImageCarrousel" class="col-4 align-self-center">
      <a id="ajoutImage" href="./index.php?route=ajoutCarrousel" class="btn btn-info">Ajouter Image</a>
  </div>
</div>
