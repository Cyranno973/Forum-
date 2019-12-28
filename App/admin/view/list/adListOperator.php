<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<center> <a href="index.php?admin=goAddOperator">Ajouter un Operateur</a></center>
					</td>
<div class="container1">
	<div class="adminContainer">
		<div class="table-box">
			<table cellpadding="10">
		
				<tr>
					<th>No.Operator</th>
					<th>Pseudo</th>
					<th>mail</th>
					<th>Droit</th>
					<th>Action</th>
				</tr>
				<?php 
				$i=0 ;
				while($data = $varModelListOperator->fetch()){ 
					$i++;
					$role = ($data['power']==1) ? 'Editeur = non <br>Moderateur = oui' : 'Editeur = oui <br>Moderateur = oui';
					?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $data['name'] ?></td>
					<td><?= $data['mail'] ?></td>
					<td><?= $role ?></td>
					<td>
						<p> <a href="index.php?admin=goUpdateOperator&operatorid=<?=$data['id']?>">Modifier</a> <a href="index.php?admin=goDeleteOperator&operatorid=<?=$data['id']?>">Supprimer</a> </p>
					</td>
				</tr>
				<?php } ?>
				
			</table>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/adtemplate.php'); ?>