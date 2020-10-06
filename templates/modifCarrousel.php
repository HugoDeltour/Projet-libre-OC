<?php
  $this->title = "Modification du carrousel";
  require('menu.php');
?>
<div id="parent" class="row justify-content-center">
  <?php for($i=0;$i<$compte;$i++){
    ?>
    <div class="col-4">
      <div class="modifImg">
        <h1>Image n°<?=$i+1;?></h1>
        <?php $this->session->set('numero_carrousel',$i);include('base_form_carrousel.php');?>
      </div>
    </div>
    <?php
  }?>
  <div id="ajouterImageCarrousel" class="col-4 align-self-center">
      <a id="ajoutImage" href="./index.php?route=ajoutCarrousel" class="btn btn-info">Ajouter Image</a>
  </div>
</div>
