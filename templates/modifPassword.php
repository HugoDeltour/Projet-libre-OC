<?php
  $this->title = "Modification du mot de passe";
  require('menu.php');
?>
<h1>Modification du mot de passe</h1>
<form method="POST">
  <div class="MDP">
    <label for="MotDePasse">Ancien mot de passe (*)</label></br>
    <input type="MotDePasse" id="MotDePasse" name="MotDePasse"></br>
    <?=isset($errors['MotDePasse'])?$errors['MotDePasse']:'';?>
  </div>

  <div class="MDP">
    <label for="nvMotDePasse">Nouveau mot de passe (*)</label></br>
    <input type="MotDePasse" id="nvMotDePasse" name="nvMotDePasse"></br>
    <?=isset($errors['nvMotDePasse'])?$errors['nvMotDePasse']:'';?>
  </div>

  <div class="MDP">
    <label for="nvMotDePasse2">Confirmation mot de passe (*)</label></br>
    <input type="MotDePasse" id="nvMotDePasse2" name="nvMotDePasse2"></br>
    <?=isset($errors['nvMotDePasse2'])?$errors['nvMotDePasse2']:'';?>
  </div>

  <p>(*) Champs obligatoire</p></br>
  <input type="submit" value="Envoyer" id="submitMDP" name="submit">
</form>
