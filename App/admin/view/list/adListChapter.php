<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<center> <a href="index.php?admin=goAddChapter">Ajouter un Chapitre</a></center>
<div class="container1">
	<div class="adminContainer">
		<div class="table-box">
			<table cellpadding="10">
				<tr>
					<th>Nbr.Chapitre</th>
					<th>Titre</th>
					<th>Action</th>
				</tr>
				<tr>
					<td>1</td>
					<td>La baleine</td>
					<td>
						<p><a href="index.php?admin=goUpdateChapter">Modifier</a> <a href="index.php?admin=goDeleteChapter">Supprimer</a></p>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>La baleine</td>
					<td>
						<p></p>Update<p>Delete</p>
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td>john</td>


					<td>
						<p></p>Update<p>Delete</p>
					</td>
				</tr>
				<tr>
					<td>4</td>
					<td>john</td>



					<td>
						<p></p>Update<p>Delete</p>
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td>john</td>



					<td>
						<p></p>Update<p>Delete</p>
					</td>
				</tr>
			</table>
		</div>
	</div>

</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/adtemplate.php'); ?>