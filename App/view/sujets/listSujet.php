<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>
<div class="main-content">
	<div class="backcontainerlist">
	<div class="container_form_rubric">
	<form action="index.php?action=createSujet" method="POST" enctype="multipart/form-data" name="sujets">
	<div class="controls">
        <select multiple="" name="fname" id="select-rubric" class="form-control chosen-select" required>
		<?php 	while($data = $varListRubric->fetch() ) : ?>	
			<option required value="<?= $data['id_rubric']; ?>"><?= $data['title_rubric']; ?></option>
		<?php endwhile; ?>
		  </select>	  
</div>
	<label for="nameSujet" class="labelSujet">Titre du Sujet :</label>
		<input type="text" name="nameSujet" id="nameSujet">
		<div id="tini">
			<textarea class="tinymce" name="sujetContent" id="sujetContent"></textarea>
			<div><button type="submit" name="submit">Envoyer</button></div>
		</div>
	</form>
	<p id="erreur"></p>
	<?php if (isset($_SESSION['idUser']) && $_SESSION['powerUser'] > 0 ) : ?>
	<div class="containerList">
			<h1>Liste des Sujets</h1>
			<ul>
				<?php
				$i = 1;
				while ($data = $varListSujet->fetch()) : ?>
					<li class=""><a href="index.php?action=goSelectSujet&id=<?=$data['id_sujet']; ?>"><span class="number"><?= $i++; ?></span><span class="list"><?= $data['title_sujet']; ?></a></span>
						<span class=" buttonList"><a href="index.php?action=goUpdateSujet&id=<?=$data['id_sujet']; ?>">Modifier</a></span>
						<span class=" buttonList"><a href="index.php?action=goDeleteSujet&id=<?=$data['id_sujet']; ?>">Supprimer</a></span>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
			<?php endif; ?>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>