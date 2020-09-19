<?php
$route = 'modifProfil&profilId='.$post->get('id_user') ;
$submit = 'Mettre à jour';
?>
  <form method="post" id='formContact'>

    <div id="Pseudo">
      <label for="pseudo">Pseudo</label></br>
      <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')):"";?>"></br>
    </div>

    <div id="Message">
      <label for="message">Message</label></br>
      <textarea id="alt" name="alt" value="<?= isset($post) ? htmlspecialchars($post->get('alt')):""; ?>"></textarea>
    </div>

    <input type="submit" id="submitUser" name="submit" value="<?= $submit;?>" >
  </form>
<div id="resultat"></div>

<script src="../js/app.js"></script>
