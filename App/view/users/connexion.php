<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>
<div class="homer">
	<p class="home"><a href="index.php?">Accueil</a></p>
	<p class="home"><a href="index.php?action=connexion">Connexion</a></p>
</div>
<div class="login-box">
	<h1>Connexion</h1>
	<form method="POST" action="index.php?action=traitementMembre&droitComment=true" id="connexion">
		<div class="textbox">
			<i class="fas fa-user"></i>
			<input type="text" name="pseudoConnect" id="pseudoConnect" placeholder="Entrez votre pseudo" >
		</div>
		<div class="textbox">
			<i class="fas fa-lock"></i>
			<input type="password" name="passwordConnect" id="passwordConnect" autocomplete="password" placeholder="Votre mot de passe" >
		</div>
		<input class="btnConnexion" type="submit" value="Se connecter" name="connexionSubmit">
	</form>
	<p id="erreur"></p>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/template.php'); ?>