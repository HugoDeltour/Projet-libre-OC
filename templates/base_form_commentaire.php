<?php
$route=isset($post) && $post->get('id_commentaire') ? 'modifCommentaire':'ajoutCommentaire';
$submit=$route==='ajoutCommentaire'?'Ajouter':'Mettre à jour';
?>

<form method="post" action="../index.php?route=<?=$route;?>&imgID=<?=htmlspecialchars($req->getId());?>">
  <div id="pseudo">
    <label for="pseudo">Pseudo (*)</label>
    <input type="text" id="pseudo" name="pseudo" value="<?= $this->session->get("pseudo");isset($post) ?htmlspecialchars($post->get('pseudo')):"" ?>"></br>
    <?=isset($errors['pseudo'])?$errors['pseudo']:'';?>
  </div>

  <div id="commentaire">
    <label for="commentaire">Commentaire (*)</label></br>
    <textarea id="commentaire" name="commentaire" value="<?= isset($post) ?htmlspecialchars($post->get('commentaire')):"" ?>"></textarea></br>
    <?=isset($errors['commentaire'])?$errors['commentaire']:'';?>
  </div>

  <p>(*) Champs obligatoire</p></br>
  <input type="submit" value="<?=$submit;?>" id="submit" name="submit">
</form>
