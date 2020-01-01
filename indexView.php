<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>


<div class="main-content">
	<div class="backcontainerlist">
	<div class="container_form_rubric">
	<form action="index.php?action=createSujet" method="POST" enctype="multipart/form-data">
	<label for="nameSujet" class="labelSujet">Titre du Sujet :</label>
		<input type="text" name="nameSujet" id="nameSujet">
		<div id="tini">
			<textarea class="tinymce" name="sujetContent" id="sujetContent"></textarea>
			<div><button type="submit" name="submit">Envoyer</button></div>
		</div>
	</form>

		<div class="containerList">
			<h1>Liste des Rubriques</h1>
			<ul>
				<?php
				$i = 1;
				while ($data = $varListSujet->fetch()) : ?>
					<li class=""><span class="number"><?= $i++; ?></span><span class="list"><?= $data['title_sujet']; ?></span>
						<span class=" buttonList"><a href="index.php?action=goUpdateSujet&id=<?=$data['id_sujet']; ?>">Modifier</a></span>
						<span class=" buttonList"><a href="index.php?action=goDeleteSujet&id=<?=$data['id_sujet']; ?>">Supprimer</a></span>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>