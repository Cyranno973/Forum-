<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="container1">
	<div class="section"><a href="index.php?admin=goIndexView" class='active'>Home</a></div>
	<div class="section"><a href="index.php?admin=ajoutAdmin">Inscription</a></div><!-- TODO retirer c'est lien apres test -->
	<div class="section"><a href="index.php?admin=goAdAdmin">Connexion</a></li><!-- TODO retirer c'est lien apres test -->
	</div>
	<div class="section"><a href="index.php?admin=goListMembre">Gestion des membres</a></div>
	<div class="section"><a href="index.php?admin=goListOperator">gestions des operateurs</a></div>
	<div class="section"><a href="index.php?admin=goListComment">gestions des commentaires</a></div>
	<div class="section"><a href="index.php?admin=goListAlert">gestions des Alerts</a></div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/adTemplate.php'); ?>