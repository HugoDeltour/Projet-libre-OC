<?php $this->title="Accueil";
  require('menu.php');
?><?php
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

<div id="MP-img">

  <div id="image">
    <div class="carousel slide" id="carouselControls" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <p class="image">
            <img src="../Photos/<?=$req[1]->getCategorie()?>/<?=$req[1]->getNom()?>" class="d-block w-50" alt="<?=$req[1]->getAlt()?>">
          </p>
        </div>
        <div class="carousel-item ">
          <p class="image">
            <img src="../Photos/<?=$req[0]->getCategorie()?>/<?=$req[0]->getNom()?>" class="d-block w-50" alt="<?=$req[1]->getAlt()?>">
          </p>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev" >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
      </a>
      <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
      </a>
    </div>
  </div>
</div>
