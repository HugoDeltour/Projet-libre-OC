<form method="post">

  <div id="Pseudo">
    <label for="pseudo">Pseudo (*)</label></br>
    <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')):"";?>">
    <?= isset($errors['pseudo']) ? $errors['pseudo']:'';?>
  </div>

  <div id="E-mail">
    <label for="email">E-mail (*)</label></br>
    <input type="email" name="email" id="email" value="<?= isset($post) ? htmlspecialchars($post->get('email')):"";?>">
    <?= isset($errors['email']) ? $errors['email']:'';?>
  </div>

  <div id="Sujet">
    <label for="sujet">Sujet (*)</label></br>
    <input type="text" id="sujet" name="sujet" value="<?= isset($post) ? htmlspecialchars($post->get('sujet')):"";?>">
    <?= isset($errors['sujet']) ? $errors['sujet']:'';?>
  </div>

  <div id="Message">
    <label for="message">Message (*)</label></br>
    <textarea id="message" name="message" value="<?= isset($post) ? htmlspecialchars($post->get('message')):""; ?>"></textarea>
    <?= isset($errors['message']) ? $errors['message']:'';?>
  </div></br>

  <p>(*) Champs obligatoire</p></br>
  <input type="submit" id="submit" name="submit" value="Envoyer" >
</form>
