<?php $this->title="Accueil";?>
<?php
  require('menu.php');
?>
<div id="MP-img">
  <div id="notification">
    <?= $this->session->display('ajout_img');?>
    <?= $this->session->display('modif_img');?>
    <?= $this->session->display('supprimer_img');?>
    <?= $this->session->display('ajout_commentaire');?>
    <?= $this->session->display('signaler_commentaire');?>
    <?= $this->session->display('inscription');?>
    <?= $this->session->display('connexion');?>
    <?= $this->session->display('deconnexion');?>
    <?= $this->session->display('supprimer_commentaire');?>
    <?= $this->session->display('signalCommentaire')?>
  </div>
  <div id="image">
      <?php
          foreach($req as $donnees){
              ?>
              <Div id="chap_img">
                <h1><a href="../index.php?route=image&imgID=<?=htmlspecialchars($donnees->getId());?>"><?php echo $donnees->getTitre();?></a></h1>
                <p><?=$donnees->getDate();?></p>
                <p><?=htmlspecialchars($donnees->getLieu());?></p>
                <img class="img-test" src="../Photos/<?=$donnees->getCategorie()?>/<?=$donnees->getNom(); ?>">
              </div></br>
              <?php
          };
      ?>
  </div>
</div>
