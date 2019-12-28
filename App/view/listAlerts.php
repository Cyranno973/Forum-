<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>

<div class="container1">
	<div class="adminContainer">
		<div class="table-box">
			<table cellpadding="10">
				<tr>
					<th>No.Alert</th>
					<th>Lanceur d'alerte</th>
					<th>Commentaire</th>
					<th>Auteur du commentaire</th>
					<th>Action</th>
				</tr>
				<?php
				$i = 1;
				while ($data = $allAlerts->fetch()) {
				?>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['pseudo'] ?></td>
						<td><?= $data['comment'] ?></td>
						<td><?= $data['pseudo_alert'] ?></td>
						<td>
							<p> <a href="index.php?action=goDeleteAlert&id=<?= $data['idc'] ?>">Supprimer Alert </a><br>
								<a href="index.php?action=goDeleteComment&id=<?= $data['idc'] ?>">Supprimer Commentaire </a>
							</p>
						</td>
					</tr>

				<?php
				}
				?>
			</table>
		</div>
	</div>
</div>
<?php $allAlerts->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>