<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<form action="index.php?action=handlingUpdateChapter&id=<?= $varTitleCheck['id'] ?>" method="POST">
	<center><input type="text" value="<?= $varTitleCheck['title']; ?>" name="titleChapter" id="titleChapter" placeholder="Titre" required></center>
	<?php $erreur; ?>
	<textarea class="tinymce" name="chapterContent" id="chapterContent"><?= $varTitleCheck['content']; ?></textarea>

	<input class="btnEnregistrer" type="submit" value="Enregistrer" name="connexionSubmit">
</form>
<?php $content = ob_get_clean(); ?>
<?php require('App/view/template.php'); ?>