<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="container1">

	<div class="adminContainer">

		<div class="table-box">
			<table cellpadding="10">
				<tr>
					<th>No.Comment</th>
					<th>titre chapitre</th>
					<th> Pseudo </th>
					<th>commentaire</th>
					<th>Action</th>
				</tr>

				<?php
				$i = 1;
				while ($data = $allComments->fetch()) {
				?>

					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['title'] ?></td>
						<td><?= $data['pseudo'] ?></td>
						<td><?= $data['comment'] ?></td>
						<td>
							<p> <a href="index.php?action=goDeleteComment&id=<?= $data['id'] ?>">Supprimer</a></p>
						</td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('App/view/template.php'); ?>