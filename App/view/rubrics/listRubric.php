<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>


<div class="main-content">
	<div class="backcontainerlist">
	<div class="container_form_rubric">
	<form action="index.php?action=createRubric" method="POST" enctype="multipart/form-data" name="rubric">
	<label for="nameRubric" class="labelrubric">Titre de la rubrique :</label>
		<input type="text" name="nameRubric" id="nameRubric">
		<div><input type="file" name="file"></div>
		<div><button type="submit" name="submit">UPLOAD</button></div>
	</form>
	<p id="erreur"></p>
		<div class="containerList">
			<h1>Liste des Rubriques</h1>
			<ul>
				<?php
				$i = 1;
				while ($data = $varListRubric->fetch()) : ?>
					<li class=""><span class="number"><?= $i++; ?></span><span class="list"><?= $data['title_rubric']; ?></span>
						<span class=" buttonList"><a href="index.php?action=goUpdateRubric&id=<?=$data['id_rubric']; ?>">Modifier</a></span>
						<span class=" buttonList"><a href="index.php?action=goDeleteRubric&id=<?=$data['id_rubric']; ?>">Supprimer</a></span>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>