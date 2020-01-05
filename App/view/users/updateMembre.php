<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="login-box">
		<h1>Mise a jours de compte </h1>
		<form method="POST" action="index.php?action=handlingUpdateOperator&id=<?= $_GET['id'] ?>">
			<div class="textbox">
				<i class="fas fa-user"></i>
				<input type="text" value='<?= $varModelGetInfoOperator['pseudo'] ?>'name="pseudoConnect" id="pseudoConnect" placeholder="Entrez un nom" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="password" value='<?= $varModelGetInfoOperator['pass'] ?>'name="passwordConnect" id="passwordConnect" placeholder="Votre un mot de passe" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="email" value='<?= $varModelGetInfoOperator['mail'] ?>' name="emailConnect" id="emailConnect" placeholder="mail" required>
			</div>
			<p>Sélectionner le type de role à attribuer à l'utilisateur</p>
			<select name="power" id="power">
			<?= $role ?>
			</select>
			<input class="btnConnexion" type="submit" value="Modifier" name="connexionSubmit">
		</form>
		<span class="error"><?php if (isset($info)) {
								echo $info;
							} ?></span>


	</div>
	<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/template.php'); ?>