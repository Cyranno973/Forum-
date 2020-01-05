<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="container_error">
<p><a href="index.php?action=inscription">Inscription</a></p>
<div class="container">
	<center ><h2 class="error404"> <?= $messageError ?></h2></center>
</div>
<p><a href="index.php?">Accueil</a></p>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/template.php'); ?>