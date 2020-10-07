<form method="POST" action="../index.php?route=ajoutImage" enctype="multipart/form-data">
  <div id="Titre">
    <label for="titre_image">Titre</label></br>
    <input type="text" id="titre_image" name="titre_image" value="<?= isset($post) ? htmlspecialchars($post->get('titre_image')):"";?>">
    <?=isset($errors['titre_image'])?$errors['titre_image']:'';?>
  </div></br>

  <div id="fichier">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000000000000">
    Fichier : <input type="file" name="nom_img_fichier">
    <?=isset($errors['nom_img_fichier'])?$errors['nom_img_fichier']:'';?>
  </div></br>

  <div id="date">
    <label for="date_image">Date (format AAAA-MM-DD)</label></br>
    <input type="text" id="date_image" name="date_image" value="<?= isset($post) ? htmlspecialchars($post->get('date_image')):""; ?>">
    <?=isset($errors['date_image'])?$errors['date_image']:'';?>
  </div></br>

  <div id="lieu">
    <label for="lieu_image">Lieu</label></br>
    <input type="text" id="lieu_image" name="lieu_image" value="<?= isset($post) ? htmlspecialchars($post->get('lieu_image')):""; ?>">
    <?=isset($errors['lieu_image'])?$errors['lieu_image']:'';?>
  </div></br>

  <div id="categorie">
    <label for="categorie">Catégorie</label></br>
    <select name="categorie" size="1">
      <option selected>Veuillez selectionner une option</option>
      <option>Mariage</option>
      <option>Naissance</option>
      <option>Grossesse</option>
      <option>Portrait</option>
      <option>Entreprise</option>
      <option>Carrousel</option>
    </select>
    <?=isset($errors['categorie'])?$errors['categorie']:'';?>
  </div></br>

  <div id="description">
    <label for="alt">Description de l'image</label></br>
    <textarea id="alt" name="alt" value="<?= isset($post) ? htmlspecialchars($post->get('alt')):""; ?>"></textarea>
    <?=isset($errors['alt'])?$errors['alt']:'';?>
  </div></br>
  <input type="submit" value="Envoyer" id="submit" name="submit">
</form>
