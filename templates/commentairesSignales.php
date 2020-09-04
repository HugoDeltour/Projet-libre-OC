<?php
  $this->title="Commentaires signalés";
  require('menu.php');
?>
<div id="MP-chap">
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
