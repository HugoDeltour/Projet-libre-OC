<?php $this->title="Accueil";
  require('menu.php');
if(!empty($this->session->get('notification'))){
  ?>
  <div id="notification" class="alert alert-success alert-dismissible fade show" role="alert">
     <h5 class="alert-heading">
    <?= $this->session->afficher('notification');?>
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
  <?= $this->session->afficher('echec');?>
  </h5>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
<?php
}
?>
<?php if(!empty($req)){
?>
<div id="carrousel">
  <div class="carousel slide" id="carouselControls" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../Photos/<?=$req[0]->getCategorie()?>/<?=$req[0]->getNom()?>" class="d-block" alt="<?=$req[0]->getAlt()?>">
      </div>
      <?php for($i=1;$i<$compteCarrousel;$i++){
        ?>
        <div class="carousel-item ">
          <img src="../Photos/<?=$req[$i]->getCategorie()?>/<?=$req[$i]->getNom()?>" class="d-block" alt="<?=$req[$i]->getAlt()?>">
        </div>
        <?php
      }?>
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
<?php
}
else{
?>
<h1>Aucune photo n'est associée au carrousel pour l'instant</h1>
<?php
  if(!empty($this->session) && $this->session->get('role')==='admin'){?>
  <h2>Veuillez ajouter une photo avec carrousel pour catégorie</br>
    Pour ce faire, veuillez aller dans administration puis dans ajouter une photo</h2>
  <?php
  }
}?>
