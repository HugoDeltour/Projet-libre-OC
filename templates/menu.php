<div id="menu">
    <input class="burger" type="checkbox">
    <nav>
        <ul class="barrenavigation">
            <?php if($this->session->get('pseudo')){
              ?>
              <li><a href="./index.php?route=deconnexion">Déconnexion</a></li>
              <?php
              if($this->session->get('role')==='admin'){
                ?>
                <li><a href="./index.php?route=administration">Administration</a></li>
                <?php
              }
              ?>
                <li><a href="./index.php?route=modifProfil&profilId=<?=$this->session->get('id');?>">Modification du profil</a></li>
                <?php
            }
            else{
              ?>
              <li><a href="./index.php?route=inscription">Inscription</a></li>
              <li><a href="./index.php?route=connexion">Connexion</a></li>
              <?php
            }
            ?>
            <li><a href="./index.php?">Accueil</a></li>
            <li><a href="./index.php?route=portofolio">Portofolio</a></li>
        </ul>
    </nav>
</div>
