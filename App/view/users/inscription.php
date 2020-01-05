<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="homer">
	<p class="home"><a href="index.php?">Accueil</a></p>
	<p class="home"><a href="index.php?action=connexion">Connexion</a></p>
</div>
		<div class="login-box">
			<h1>Inscription</h1>
			<form method="POST" action="index.php?action=inscriptionTraitement" name="inscription">
				<div class="textbox">
					<i class="fas fa-user"></i>
					<input type="text" name="pseudoInscription" id="pseudoInscription" placeholder="Entrez votre pseudo" >
				</div>
				<div class="textbox">
					<i class="fas fa-lock-open"></i>
					<input type="password" name="passwordInscription" id="passwordInscription" placeholder="Votre mot de passe" >
				</div>
				<div class="textbox">
					<i class="fas fa-lock"></i>
					<input type="password" name="passwordInscription2" id="passwordInscription2" placeholder="Confirmez le mot de passe" >
				</div>
				<div class="textbox">
					<i class="fas fa-lock"></i>
					<input type="email" name="emailInscription" id="emailInscription" placeholder="Mail" >
				</div>
				<input class="btnConnexion" type="submit" value="Je m'inscris" name="submitinscription">
			</form>
			<p id="erreur"></p>
	<?php $content = ob_get_clean(); ?>
	<?php require('App/view/templates/template.php'); ?>