<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>

<div class="inscription">

	<div class="container_connexion">

		<div class="login-box">
			<h1>Inscription</h1>
			<form method="POST" action="index.php?action=inscriptionTraitement">
				<div class="textbox">
					<i class="fas fa-user"></i>
					<input type="text" name="pseudoInscription" id="pseudoInscription" placeholder="Entrez votre pseudo" required>
				</div>
				<div class="textbox">
					<i class="fas fa-lock-open"></i>
					<input type="password" name="passwordInscription" id="passwordInscription" placeholder="Votre mot de passe" required>
				</div>
				<div class="textbox">
					<i class="fas fa-lock"></i>
					<input type="password" name="passwordInscription2" id="passwordInscription2" placeholder="Confirmez le mot de passe" required>
				</div>
				<div class="textbox">
					<i class="fas fa-lock"></i>
					<input type="email" name="emailInscription" id="emailInscription" placeholder="Mail" required>
				</div>
				<input class="btnConnexion" type="submit" value="Je m'inscris" name="submitinscription">

			</form>


		</div>
	</div>


	<?php $content = ob_get_clean(); ?>
	<?php require('App/view/template.php'); ?>