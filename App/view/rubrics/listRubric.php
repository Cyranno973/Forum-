<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>


<div class="main-content">
	<div class="backcontainerlist">
	<form action="index.php?action=createRubric" method="POST" enctype="multipart/form-data">
		<input type="text" name="nameRubric" id="nameRubric" placeholder="Tire de la rubrique"><br>
		<input type="file" name="file" id="file">
		<button type="submit" name="submit" >UPLOAD</button>
	</form>
		<div class="containerList">
			<h1>Liste des Rubriques</h1>
			<ul>
				<?php
				$i = 1;
				while ($data = $varListRubric->fetch()) : ?>
					<li class=""><span class="number"><?= $i++; ?></span><span class="list"><?= $data['title_rubric'] ?></span>
						<span class=" buttonList"><a href="index.php?action=goDeleteComment&id=">Modifier</a></span> <span class=" buttonList"><a href="index.php?action=goDeleteComment&id=">Supprimer</a></span></li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>