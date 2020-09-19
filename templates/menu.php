<div id="menu">
    <nav class="col navbar navbar-expand-lg bg-dark navbar-dark">
      <a class="navbar-brand" href="./index.php">Logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarContent" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.php?">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.php?route=portofolio">Portofolio</a>
          </li>
            <?php if($this->session->get('pseudo')){
              ?>
                <li class="nav-item">
                  <a class="nav-link" href="./index.php?route=modifProfil&profilId=<?=$this->session->get('id');?>">Modification du profil</a>
                </li>
                <?php

                  if($this->session->get('role')==='admin'){
                    ?>
                    <li  class="nav-item">
                      <a class="nav-link" href="./index.php?route=administration">Administration</a>
                    </li>
                    <?php
                  }
                  ?>
                  <li class="nav-item">
                    <a  class="nav-link" href="./index.php?route=deconnexion">Déconnexion</a>
                  </li>
                  <?php
            }
            else{
              ?>
              <li class="nav-item">
                <a class="nav-link" href="./index.php?route=inscription">Inscription</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./index.php?route=connexion">Connexion</a>
              </li>
              <?php
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="./index.php?route=contact">Contact</a>
            </li>
        </ul>
      </div>

    </nav>
</div>
