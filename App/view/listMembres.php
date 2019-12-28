<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>

<div class="container1">
	<div class="adminContainer">
		<!-- <center> <a href="index.php?action=addChapters">Ajouter un Membre</a></center> -->
		<div class="table-box">
			<table cellpadding="10">
				<tr>
					<th>Nbr.Membre</th>
					<th>Pseudo</th>
					<th>mail</th>
					<th>Droit</th>
					<!-- <th>Action</th> -->
				</tr>
				<?php
				$i = 1;
				while ($data = $varListMembres->fetch()) {
				?>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['pseudo'] ?></td>
						<td><?= $data['mail'] ?></td>
						<td><?= $data['droitUser'] ?></td>
						
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
</div>
<?php $varListMembres->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<?php require('App/view/template.php'); ?>