<?php
$route = 'ajoutCarrousel' ;
$submit = 'Envoyer';
?>

<form method="post" action="../index.php?route=<?=$route?>" enctype="multipart/form-data">
  <div id="Titre">
    <label for="titre_image">Titre</label></br>
    <input type="text" id="titre_image" name="titre_image" value="<?=isset($image) ? $image[$this->session->get('numero_carrousel')]->getTitre():""; isset($post) ? htmlspecialchars($post->get('titre_image')):"";?>">
    <?=isset($errors['titre_image'])?$errors['titre_image']:'';?>
  </div></br>

  <div id="fichier">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000000000000">
    Fichier : <input type="file" name="nom_img_fichier">
    <?=isset($errors['nom_img_fichier'])?$errors['nom_img_fichier']:'';?>
  </div></br>

  <div id="date">
    <label for="date_image">Date (format AAAA-MM-DD)</label></br>
    <input type="text" id="date_image" name="date_image" value="<?=isset($image) ? $image[$this->session->get('numero_carrousel')]->getDate():""; isset($post) ? htmlspecialchars($post->get('date')):""; ?>">
    <?=isset($errors['date_image'])?$errors['date_image']:'';?>
  </div></br>

  <div id="lieu">
    <label for="lieu_image">Lieu</label></br>
    <input type="text" id="lieu_image" name="lieu_image" value="<?=isset($image) ? $image[$this->session->get('numero_carrousel')]->getLieu():""; isset($post) ? htmlspecialchars($post->get('lieu')):""; ?>">
    <?=isset($errors['lieu_image'])?$errors['lieu_image']:'';?>
  </div></br>

  <div id="categorie">
    <input type="hidden" name="categorie" value="carrousel">
  </div></br>

  <div id="description">
    <label for="alt">Description de l'image</label></br>
    <textarea id="alt" name="alt"><?=isset($image) ? $image[$this->session->get('numero_carrousel')]->getAlt():""; isset($post) ? htmlspecialchars($post->get('alt')):""; ?></textarea>
    <?=isset($errors['alt'])?$errors['alt']:'';?>
  </div></br>
  <input type="submit" value="<?=$submit?>" id="submitCarrousel" name="submit">
</form>
