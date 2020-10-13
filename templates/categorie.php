<?php $this->title="Mariage";
  require('menu.php');
?>
<div id="image">
<?php
  if(empty($req)){
    ?><h1>Aucune photo pour cette catégorie</h1><?php
  }
  else{
    foreach($req as $donnees){
        ?>
        <div id="cat_img">
          <h1><a href="../index.php?route=image&imgID=<?=htmlspecialchars($donnees->getId());?>"><?php echo $donnees->getTitre();?></a></h1>
          <img class="img" src="../Photos/<?=$donnees->getCategorie();?>/<?=$donnees->getNom(); ?>" alt="<?= $donnees->getAlt()?>">
        </div></br>
        <?php
    };
  }
?>
</div>
