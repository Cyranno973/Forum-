<?php $title = "Roman Jean Forteroche"; ?>
echo 'arriver';
<?php ob_start(); ?>
<div class="container_connexion">
	<div class="login-box">
		<h1>Mise a jours Membre</h1>
		<form method="POST" action="index.php?admin=goAddOperator">
			<div class="textbox">
				<i class="fas fa-user"></i>
				<input type="text" name="pseudoConnect" id="pseudoConnect" placeholder="Entrez votre pseudo" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="password" name="passwordConnect" id="passwordConnect" placeholder="Votre mot de passe" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="email" name="emailConnect" id="emailConnect" placeholder="mail" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="email" name="emailConnect2" id="emailConnect2" placeholder="mail" required>
			</div>
			<input class="btnConnexion" type="submit" value="Se connecter" name="connexionSubmit">
		</form>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/adTemplate.php'); ?>