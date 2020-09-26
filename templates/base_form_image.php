<?php
$route = isset($post) && $post->get('id_image') ? 'modifImage&imgID='.$post->get('id_image') : 'ajoutImage' ;
$submit = $route === 'ajoutImage' ? 'Envoyer' : 'Mettre à jour';
?>

<form method="post" action="../index.php?route=<?=$route; ?>" enctype="multipart/form-data">
  <div id="Titre">
    <label for="titre_image">Titre</label></br>
    <input type="text" id="titre_image" name="titre_image" value="<?= isset($post) ? htmlspecialchars($post->get('titre_image')):"";?>">
    <?=isset($errors['titre_image'])?$errors['titre_image']:'';?>
  </div></br>

  <div id="fichier">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?= ini_get('upload_max_filesize');?>">
    <label for="nom_img_fichier">Choix du fichier</label></br>
    <input type="file" id="nom_img_fichier" name="nom_img_fichier" value="<?= isset($post) ? htmlspecialchars($post->get('nom_img_fichier')):"";?>">
    <?=isset($errors['MAX_FILE_SIZE'])?$errors['MAX_FILE_SIZE']:'';?>
  </div></br>

  <div id="date">
    <label for="date_image">Date (format AAAA-MM-DD)</label></br>
    <input type="text" id="date_image" name="date_image" value="<?= isset($post) ? htmlspecialchars($post->get('date')):""; ?>">
    <?=isset($errors['date_image'])?$errors['date_image']:'';?>
  </div></br>

  <div id="lieu">
    <label for="lieu_image">Lieu</label></br>
    <input type="text" id="lieu_image" name="lieu_image" value="<?= isset($post) ? htmlspecialchars($post->get('lieu')):""; ?>">
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
    </select>
    <?=isset($errors['categorie'])?$errors['categorie']:'';?>
  </div></br>

  <div id="description">
    <label for="alt">Description de l'image</label></br>
    <textarea id="alt" name="alt" value="<?= isset($post) ? htmlspecialchars($post->get('alt')):""; ?>"></textarea>
    <?=isset($errors['alt'])?$errors['alt']:'';?>
  </div></br>
  <input type="submit" value="<?= $submit;?>" id="submit" name="submit">
</form>
