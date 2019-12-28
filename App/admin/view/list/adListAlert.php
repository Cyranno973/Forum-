<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="contain">
	<div class="adminContainer">
		<div class="table-box">
			<table cellpadding="10">
				<tr>
					<th>No.Alert</th>
					<th>Id SignalUser</th>
					<th>Id Comment</th>
					<th>IdWriterComment</th>
					<th>Action</th>
				</tr>
				<tr>
					<td>1</td>
					<td>4</td>
					<td>3</td>

					<td>2</td>
					<td>
						<p><a href="index.php?admin=goDeleteComment">Supprimer commentaire</a> |<a href="index.php?admin=goDeleteAlert">Supprimer alert</a></p>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>5</td>
					<td>2</td>

					<td>3</td>
					<td>
						<p><a href="index.php?admin=goDeleteAlert">Supprimer</a> </p>
					</td>
				</tr>
				<tr>
					<td>4</td>
					<td>3</td>
					<td>8</td>

					<td>5</td>
					<td>
						<p><a href="index.php?admin=goDeleteAlert">Supprimer</a> </p>
					</td>
				</tr>
				<tr>
					<td>4</td>
					<td>7</td>
					<td>8</td>

					<td>9</td>
					<td>
						<p><a href="index.php?admin=goDeleteAlert">Supprimer</a> </p>
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td>4</td>
					<td>12</td>

					<td>1</td>
					<td>
						<p><a href="index.php?admin=goDeleteAlert">Supprimer</a> </p>
					</td>
				</tr>

			</table>
		</div>
	</div>

</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/adtemplate.php'); ?>