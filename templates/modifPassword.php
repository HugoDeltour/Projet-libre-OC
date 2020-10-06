<?php
  $this->title = "Modification du mot de passe";
  require('menu.php');
?>
<div id="MP-img">
  <div id="modifImg">
    <h1>Modification du mot de passe</h1>
    <form method="POST">
      <div class="MDP">
        <label for="password">Ancien mot de passe</label></br>
        <input type="password" id="password" name="password"></br>
        <?=isset($errors['password'])?$errors['password']:'';?>
      </div>

      <div class="MDP">
        <label for="nvPassword">Nouveau mot de passe</label></br>
        <input type="password" id="nvPassword" name="nvPassword"></br>
        <?=isset($errors['nvPassword'])?$errors['nvPassword']:'';?>
      </div>

      <div class="MDP">
        <label for="nvPassword2">Confirmation mot de passe</label></br>
        <input type="password" id="nvPassword2" name="nvPassword2"></br>
        <?=isset($errors['nvPassword2'])?$errors['nvPassword2']:'';?>
      </div>

      <input type="submit" value="Envoyer" id="submitMDP" name="submit">
    </form>
  </div>
</div>
