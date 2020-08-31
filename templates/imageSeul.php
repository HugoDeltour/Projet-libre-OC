<?php $this->title="Image";
require('menu.php');
?>
<div id="MP-chap">
  <div id="element-central">
    <div id="image">
      <img class="img-test" src="../Photos/AVEYRON/<?=$req->getNom()?>">
    </div>
    </br>
    <div class="administration">
      <?php if($this->session->get('role')==='admin'){
        ?>
        <a href="../index.php?route=supprimerChapitre&chapID=<?=$req->getId();?>">Supprimer</a>
        <a href="../index.php?route=modifChapitre&chapID=<?=$req->getId();?>">Modifier</a>
        <?php
      }
      ?>
    </div>
    <div id="ajoutCommentaire">
      <h3>Ajouter un commentaire</h3>
      <?php include('base_form_commentaire.php');?>
      <h3>Commentaires</h3>
      <?php
          foreach($comments as $comment)
          {?>
            <div id="Commentaire">
              <p><?= htmlspecialchars($comment->getPseudo());?></p>
              <p><?= $comment->getComment();?></p>
              <p><?= htmlspecialchars($comment->getDate());?></p>
              <?php
              if($comment->isSignal()){
                ?>
                <p>Commentaire déjà signaler</p>
                <?php
              }else{
                ?>
                <p><a href="../index.php?route=signalerCommentaire&commentaireID=<?= $comment->getId(); ?>">Signaler</a></p>
                <?php
              }
              ?>
            </div>
            </br>
            <?php
          }
      ?>
    </div>
  </div>
</div>