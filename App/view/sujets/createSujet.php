<?php $title = "Roman Jean Forteroche"; ?>
<?php ob_start(); ?>
<div class="main-content">
<div class="form-group">
	<form method="POST" action="index.php?action=handlingInscriptionSujet">
    <label for="select-rubric" > Choisissez la rubrique </label>
    <div class="controls">
        <select multiple="" name="fname" id="select-rubric" class="form-control chosen-select" required>
			<option value="2">HTML</option>
			<option value="3">CSS</option>
			<option value="4">PHP</option>
			<option value="5">JAVASCRIPT</option>
			<option value="6">WINDOWS</option>
			<option value="7">LINUX</option>
			<option value="8">JAVA</option>
			<option value="9">ANGULAR</option>
			<option value="10">VUE JS</option>
		  </select>	  
</div>

<input type="text" value="" name="titleSujet" id="titleSujet" placeholder="Titre" required>
<textarea class="tinymce" name="ContentSujet" id="ContentSujet"></textarea>

	<input class="btnEnvoyer" type="submit" value="Envoyer" name="btnEnvoyer">
	</form>
</div>


</div>

<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>