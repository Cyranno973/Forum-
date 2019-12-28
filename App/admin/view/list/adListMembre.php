<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="contain">
	<div class="adminContainer">
		<div class="table-box">
			<table cellpadding="10">
				<tr>
					<th>Nbr.Membre</th>
					<th>Pseudo</th>
					<th>Name</th>
					<th>mail</th>
					<th>Action</th>
				</tr>
				<tr>
					<td>1</td>
					<td>john</td>
					<td>Wick</td>
					<td>Wick@gmail.com</td>
					<td>
						<p> <a href="index.php?admin=goUpdateMembre">Modfier</a> <a href="index.php?admin=goDeleteMembre">Supprimer</a> </p>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>john</td>
					<td>Wick</td>
					<td>Wick@gmail.com</td>
					<td>
						<p>Delete</p>
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td>john</td>
					<td>Wick</td>
					<td>Wick@gmail.com</td>
					<td>
						<p>Delete</p>
					</td>
				</tr>
				<tr>
					<td>4</td>
					<td>john</td>
					<td>Wick</td>
					<td>Wick@gmail.com</td>
					<td>
						<p>Delete</p>
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td>john</td>
					<td>Wick</td>
					<td>Wick@gmail.com</td>
					<td>
						<p>Delete</p>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/adtemplate.php'); ?>