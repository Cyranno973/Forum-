<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<p><a href="index.php?admin=goDeleteAlert">Etes vous sur de vouloir supprimer l'alerte?</a> </p>
<?php $content = ob_get_clean(); ?>
<?php require('view/adtemplate.php'); ?>