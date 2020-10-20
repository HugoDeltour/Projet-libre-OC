<?php
  $this->title="Inscription";
  require('menu.php');
?>
<h1>Inscription</h1>
<form action="./index.php?route=inscription" method="post">
  <label for="pseudo">Pseudo (*)</label></br>
  <input type="text" id="pseudo" name="pseudo" value="<?= isset($post)?htmlspecialchars($post->get('pseudo')):''?>"></br>
  <?= isset($errors['pseudo']) ? $errors['pseudo']:'';?>
  <label for="password">Mot de passe (*)</label></br>
  <input type="password" id="password" name="password"></br>
  <?= isset($errors['password']) ? $errors['password']:'';?>
  <p>(*) Champs obligatoire</p>
  <input type="submit" value="Inscription" id="submit" name="submit"></br>
</form>
