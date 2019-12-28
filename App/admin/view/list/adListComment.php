<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="contain">
	<select>
		<option>Chapitre 1</option>
		<option>Chapitre 2</option>
		<option>Chapitre 3</option>
	</select>
	<div class="adminContainer">
		<div class="table-box">
			<table cellpadding="10">
				<tr>
					<th>No.Comment</th>
					<th> Pseudo </th>
					<th>titre chapitre</th>
					<th>id commentaire</th>
					<th>commentaire</th>
					<th>Action</th>
				</tr>
				<tr>
					<td>1</td>
					<td>sabrina</td>
					<td>Le Moulin</td>
					<td>id commentaire</td>
					<td> Commentaire</td>
					<td>
						<p><a href="index.php?admin=goDeleteComment">Supprimer</a> </p>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Gerard</td>
					<td>la baleine</td>
					<td>id commentaire</td>
					<td>Commentaire</td>
					<td>
						<p><a href="Update">Supprimer</a> </p>
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td>2</td>
					<td>1</td>
					<td>id commentaire</td>
					<td>Commentaire</td>
					<td>
						<p><a href="Update">Supprimer</a> </p>
					</td>
				</tr>
				<tr>
					<td>4</td>
					<td>1</td>
					<td>4</td>
					<td>id commentaire</td>
					<td>Commentaire</td>
					<td>
						<p><a href="Update">Supprimer</a> </p>
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td>2</td>
					<td>1</td>
					<td>id commentaire</td>
					<td>Commentaire</td>
					<td>
						<p><a href="Update">Supprimer</a> </p>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/adtemplate.php'); ?>