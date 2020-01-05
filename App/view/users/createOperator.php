<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>

<div class="login-box">
		<h1>Inscription operateur</h1>
		<form method="POST" action="index.php?action=handlingInscriptionOperator">
			<div class="textbox">
				<i class="fas fa-user"></i>
				<input type="text" name="pseudoInscription" id="pseudoInscription" placeholder="Entrez un nom" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>	<!-- les input mot de passe sont indetique a corriger  -->
				<input type="password" name="passwordInscription" id="passwordInscription" placeholder="Votre un mot de passe" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="email" name="emailInscription" id="emailInscription" placeholder="mail" required>
			</div>
			<p>Sélectionner le type de role à attribuer à l'utilisateur</p>
			<select name="power" id="power">
			<option value="0">Membre</option>
				<option value="1">Moderateur</option>
				<option value="2">Editeur</option>
				<option value="3">Admin</option>
			</select>
			<input class="btnConnexion" type="submit" value="Ajouter" name="connexionSubmit">
		</form>
		<span class="error"><?php if (isset($info)) {
								echo $info;
							} ?></span>


	</div>
	<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/template.php'); ?>