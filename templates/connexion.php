<?php
  $this->title="Connexion";
  require('menu.php');
?>
<h1>Connexion</h1>
<form action="../index.php?route=connexion" method="post">
  <label for="pseudo">Pseudo (*)</label></br>
  <input type="text" id="pseudo" name="pseudo" value="<?= isset($post)?htmlspecialchars($post->get('pseudo')):''?>"></br>
  <?=isset($errors['pseudo'])?$errors['pseudo']:'';?>
  <label for="password">Mot de passe (*)</label></br>
  <input type="password" id="password" name="password"></br>
  <?=isset($errors['password'])?$errors['password']:'';?>
  <p>(*) Champs obligatoire</p>
  <input type="submit" value="Connexion" id="submit" name="submit"></br>
</form>

<a href="../index.php?route=MDPoublie">Mot de passe oublié ?</a>
