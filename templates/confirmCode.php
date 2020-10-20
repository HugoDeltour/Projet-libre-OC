<?php
  $this->title="Confirmation du code";
  require('menu.php');
?>
<h1>Récupération du mot de passe</h1>
<h2>Merci d'entrer le code reçu par mail</h2>
<form method="post">

  <label for="pseudo">Pseudo (*)</label></br>
  <input type="text" id="pseudo" name="pseudo" value="<?= isset($post)?htmlspecialchars($post->get('pseudo')):''?>"></br>
  <?=isset($errors['pseudo'])?$errors['pseudo']:'';?>

  <label for="code">Code (*)</label></br>
  <input type="code" name="code" id="code" value="<?= isset($post) ? htmlspecialchars($post->get('code')):"";?>"></br>
  <?= isset($errors['code']) ? $errors['code']:'';?>
  <p>(*) Champs obligatoire</p>
  <input type="submit" value="Récupérer mon mot de passe" id="submit" name="submit"></br>
</form>
