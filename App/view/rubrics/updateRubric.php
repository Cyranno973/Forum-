<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>


<div class="main-content">
	<div class="backcontainerlist">
	<div class="container_form_rubric">
	<form class="container_form_rubric" action="index.php?action=createRubric" method="POST" enctype="multipart/form-data">
	<label for="nameRubric" class="labelrubric">Titre de la rubrique :</label>
		<input type="text" name="nameRubric" id="nameRubric" value="<?= $varCheckRubric['title_rubric']; ?>">
		<div><input type="file" name="file" id="file"></div>
		<div><button type="submit" name="submit" >UPLOAD</button></div>
	</form>
	
		<div class="containerList">
			<h1>Liste des Rubriques</h1>
			<ul>
			
				$i = 1;
				
				<li class=""><span class="number"><?= $i++; ?></span><span class="list"><?= $varCheckRubric['title_rubric']; ?></span>
						<span class=" buttonList"><a href="index.php?action=goUpdateRubric&id=<?=$varCheckRubric['id_rubric']; ?>">Modifier</a></span> <span class=" buttonList"><a href="index.php?action=goDeleteRubric&id=<?=$varCheckRubric['id_rubric']; ?>">Supprimer</a></span></li>
			
			</ul>
		</div>
	</div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>