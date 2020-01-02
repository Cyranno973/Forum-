<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>


<div class="main-content">
	<div class="backcontainerlist">
	<div class="container_form_rubric">
	

	<div class="containerList">
			<h1>Liste des Sujets</h1>
			<ul>
				<?php
				$i = 1;
				while ($data = $varFilterSujet->fetch()) : ?>
					<li class=""><a href="index.php?action=goSelectSujet&id=<?=$data['id_sujet']; ?>"><span class="number"><?= $i++; ?></span><span class="list"><?= $data['title_sujet']; ?></a></span>
	
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>