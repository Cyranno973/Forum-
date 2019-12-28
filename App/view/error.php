<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="container_error">

	<h2 class="error404"> <?= $messageError ?></h2>
	<p><a href="index.php"> Retour à la liste des chapitres</a></p>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('App/view/template.php'); ?>