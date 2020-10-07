<?php
$route ='modifImage&imgID='.$post->get('id_image');
$submit = 'Mettre à jour';
?>

<form method="post" action="../index.php?route=<?=$route; ?>" enctype="multipart/form-data">
  <div id="Titre">
    <label for="titre_image">Titre</label></br>
    <input type="text" id="titre_image" name="titre_image" value="<?= isset($post) ? htmlspecialchars($post->get('titre_image')):"";?>">
    <?=isset($errors['titre_image'])?$errors['titre_image']:'';?>
  </div></br>

  <div id="fichier">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000000000000">
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
    <label name="categorie"><?= $post->get('categorie')?></label>
  </div></br>

  <div id="description">
    <label for="alt">Description de l'image</label></br>
    <textarea id="alt" name="alt" value="<?= isset($post) ? htmlspecialchars($post->get('alt')):""; ?>"></textarea>
    <?=isset($errors['alt'])?$errors['alt']:'';?>
  </div></br>
  <input type="submit" value="<?= $submit;?>" id="submit" name="submit">
</form>
