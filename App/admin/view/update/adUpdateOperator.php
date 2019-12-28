<?php $title = "Roman Jean Forteroche"; ?>
<?php
$role = ($varModelGetInfoOperator['power'] == 1) ? '<OPTION value="2">Editeur</OPTION><OPTION selected value="1">Moderateur</OPTION>' : '<OPTION selected value="2">Editeur</OPTION><OPTION value="1">Moderateur</OPTION>';
?>
<?php ob_start(); ?>
<div class="container_connexion">
	<div class="login-box">
		<h1>Mise a jours Opérateur</h1>
		<form method="POST" action="index.php?admin=handlingUpdateOperator&operatorid=<?= $_GET['operatorid'] ?>">
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="text" name="pseudoConnect" value='<?= $varModelGetInfoOperator['name'] ?>' id="pseudoConnect" placeholder="Entrez un nom" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="password" name="passwordConnect" value='<?= $varModelGetInfoOperator['pass'] ?>' id="passwordConnect" placeholder="Votre mot de passe" required>
			</div>
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="email" name="emailConnect" value='<?= $varModelGetInfoOperator['mail'] ?>' id="emailConnect" placeholder="mail" required>
			</div>
			<p>Sélectionner le type de role à attribuer à l'utilisateur</p>
			<SELECT name="power" id="power">
				<?= $role ?>
			</SELECT>
			<input class="btnConnexion" type="submit" value="Modifier" name="connexionSubmit">
		</form>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/adTemplate.php'); ?>