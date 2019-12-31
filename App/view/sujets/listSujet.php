<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>

<div class="container1">
	<div class="adminContainer">
	<div class="addchapter">
	
		 <a href="index.php?action=addChapters"><i class="material-icons">
post_add
</i>Ajouter un Chapitre</a>
	</div>
		<div class="table-box">
			<table cellpadding="10">
				<tr>
					<th>Nbr.Chapitre</th>
					<th>Titre</th>
					<th>Action</th>
				</tr>
				<?php
				$i = 1;
				while ($data = $varListChapters->fetch()) {
				?>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['title'] ?></td>
						<td>
							<p><a href="index.php?action=goUpdateChapter&id=<?= $data['id'] ?>">Modifier</a> <a href="index.php?action=goDeleteChapter&id=<?= $data['id'] ?>">Supprimer</a></p>
						</td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
</div>
<?php $varListChapters->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<?php require('App/view/template.php'); ?>