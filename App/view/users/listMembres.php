<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>

<div class="main-content">
<span class=" buttonList"><a href="index.php?action=goAddOperator">Ajouter un operateur</a></span>
		<div class="table-box">
			<table cellpadding="10">
				<tr>
					<th>Nbr.Membre</th>
					<th>Pseudo</th>
					<th>mail</th>
					<th>Droit</th>
					<th>Action</th>
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
						<td>	<span class=" buttonList"><a href="index.php?action=goUpdateOperator&id=<?=$data['id']; ?>">Modifier</a></span>
						<span class=" buttonList"><a href="index.php?action=goDeleteUser&id=<?=$data['id']; ?>">Supprimer</a></span></td>
						
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
<?php require('App/view/templates/templateHome.php'); ?>