<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<form action="index.php?admin=handlingInscriptionChapter" method="POST">
<center><input type="text" name="titleChapter" id="titleChapter" placeholder="Titre" required></center>
<?php $erreur; ?>
<textarea class="tinymce" name="chapterContent" id="chapterContent" ></textarea >
<input class="btnEnregistrer" type="submit" value="Enregistrer" name="connexionSubmit">
</form>
<?php $content = ob_get_clean(); ?>
<?php require('view/adtemplate.php'); ?>