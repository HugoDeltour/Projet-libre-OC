<?php $this->title="Accueil";
  require('menu.php');
?>
<div id="MP-img">
  <?php
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
  <div id="image">
    <div class="carousel slide" id="carouselControls" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../Photos/Mariage/DSC_0151.JPG" class="d-block w-50" alt="DSC_0151.JPG">
        </div>
        <div class="carousel-item ">
          <img src="../Photos/Mariage/GY8Rg8f.png" class="d-block w-50" alt="GY8Rg8f.png">
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
