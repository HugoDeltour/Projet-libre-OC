<?php
$route = 'modifProfil&profilId='.$post->get('id_user') ;
$submit = 'Mettre à jour';
?>

<form method="post" id='formUser'>

  <input type="hidden" id="varId" value="<?=htmlspecialchars($post->get('id_user'));?>">

  <label for="pseudo">Pseudo</label></br>
  <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')):"";?>"></br>
  <?=isset($errors['pseudo'])?$errors['pseudo']:'';?>

  <label for="password">Mot de passe</label></br>
  <input type="text" id="password" name="password" value="<?= isset($post) ? htmlspecialchars($post->get('password')):"";?>"></br>
  <?=isset($errors['password'])?$errors['password']:'';?>

  <input type="submit" value="<?= $submit;?>" id="submitUser" name="submit">
</form>
<div id="test"></div>

<script src="../js/app.js"></script>
