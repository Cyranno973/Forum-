<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="container_connexion">
	<div class="login-box">
		<h1>Creation de votre compte Admin</h1>
		<form method="POST" action="index.php">
			<div class="textbox">
				<i class="fas fa-user">admin</i>
				
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="password" name="passwordInscription" id="passwordInscription" placeholder="Votre mot de passe" required>
				<input type="password" name="passwordInscription2" id="passwordInscription2" placeholder="Confimer mdp" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="email" name="emailInscription" id="emailInscription" placeholder="mail" required>
			</div>
			<input class="btnConnexion" type="submit" value="Creer mon compte" name="connexionSubmit">
		</form>
		<span class="error"><?php if (isset($erreur)) {
								echo $erreur;
							} ?></span>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/adTemplate.php'); ?>