<?php
  $this->title="Recupération du mot de passe";
  require('menu.php');
?>
<h1>Récupération du mot de passe</h1>
<form method="post">

  <label for="pseudo">Pseudo (*)</label></br>
  <input type="text" id="pseudo" name="pseudo" value="<?= isset($post)?htmlspecialchars($post->get('pseudo')):''?>"></br>
  <?=isset($errors['pseudo'])?$errors['pseudo']:'';?>

  <label for="email">E-mail (*)</label></br>
  <input type="email" name="email" id="email" value="<?= isset($post) ? htmlspecialchars($post->get('email')):"";?>"></br>
  <?= isset($errors['email']) ? $errors['email']:'';?>

  <p>(*) Champs obligatoire</p>
  <input type="submit" value="Récupérer mon mot de passe" id="submit" name="submit"></br>
</form>
