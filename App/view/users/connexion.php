<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>


<div class="container_connexion">


	<div class="login-box">

		<h1>Connexion</h1>
		<form method="POST" action="index.php?action=traitementMembre&droitComment=true">

			<div class="textbox">
				<i class="fas fa-user"></i>
				<input type="text" name="pseudoConnect" id="pseudoConnect" placeholder="Entrez votre pseudo" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="password" name="passwordConnect" id="passwordConnect" placeholder="Votre mot de passe" required>
			</div>
			<input class="btnConnexion" type="submit" value="Se connecter" name="connexionSubmit">
		</form>
	</div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/template.php'); ?>