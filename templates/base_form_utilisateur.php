<?php
$submit = 'Mettre à jour';
?>
  <form method="post" id='formUser'>

    <input type="hidden" id="varId" name="id" value="<?=htmlspecialchars($post->get('id_user'));?>">
    <input type="hidden" id="varsub" name="submit" value="submit">
    <div id="submitPseudo">
      <label for="pseudo">Pseudo</label></br>
      <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')):"";?>"></br>
    </div>

    <div id="submitPassword">
      <label for="password">Mot de passe</label></br>
      <input type="text" id="password" name="password" value="<?= isset($post) ? htmlspecialchars($post->get('password')):"";?>"></br>
    </div>

    <input type="submit" id="submitUser" name="submit" value="<?= $submit;?>" >
  </form>
<div id="resultat"></div>

<script src="../js/app.js"></script>
