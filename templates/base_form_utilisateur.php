<form method="post" id='formUser'>

  <input type="hidden" id="varId" name="id" value="<?=htmlspecialchars($post->get('id_user'));?>">
  <input type="hidden" id="varsub" name="submit" value="submit">
  <div id="submitPseudo">
    <label for="pseudo">Pseudo (*)</label></br>
    <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')):"";?>"></br>
  </div>

  <div id="submitPassword">
    <a href="/index.php?route=modifPassword">Modifier mon mot de passe</a>
  </div>

  <p>(*) Champs obligatoire</p></br>
  <input type="submit" id="submitUser" name="submit" value="Mettre à jour" >
</form>
<div id="resultat"></div>

<script src="../js/app.js"></script>
