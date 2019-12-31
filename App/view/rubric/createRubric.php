<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="containerTable">
<form action="index.php?action=handlingInscriptionChapter" method="POST">
	<div class="addchapter">
	<input type="text" name="titleChapter" id="titleChapter" placeholder="Titre" required></<input>
	</div>
	<?php $erreur; ?>
	<textarea class="tinymce" name="chapterContent" id="chapterContent"></textarea>
	<input class="btnEnregistrer" type="submit" value="Enregistrer" name="connexionSubmit">
</form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('App/view/template.php'); ?>