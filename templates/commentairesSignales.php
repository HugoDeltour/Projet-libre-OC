<?php
  $this->title="Commentaires signalés";
  require('menu.php');
?>
<div id="MP-chap">
  <div id="list-chap">
      <h1>Chapitre</h1>
      <?php
          foreach($reqChap as $donnees){
              ?>
              <a href="../index.php?route=chapitre&chapID=<?=htmlspecialchars($donnees->getId());?>"><?php echo $donnees->getTitle();?></a></br><?php
          };
      ?>
  </div></br>
  <div id="commentairesSignales">
    <h1>Commentaires signalés</h1>
    <?php
      foreach ($reqComSignal as $donnees) {
        ?>
        <?=$donnees->getComment();?>
        <a href="../index.php?route=supprimerCommentaire&comID=<?=$donnees->getId();?>">Supprimer</a>
        <a href="../index.php?route=nonSignalCommentaire&comID=<?=$donnees->getId();?>">Enlever le signalement</a>
        <?php
      }
    ?>
  </div>
</div>
