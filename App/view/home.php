<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>



	<div class="main-content">
		<div class="title">
		Bienvenue !
		Les forums de CyraTech sont dédiés aux professionnels de l'informatique, et au débutant.
		</div>
		<div class="main">

		<?php while ($data = $varListRubric->fetch()) : ?>
			<div class="widget">
			<a href="">
				<div> 
					<a class="title-rubric" href="index.php?action=goFilterSujet&id=<?=$data['id_rubric']; ?>"><?= $data['title_rubric']; ?></a>
				 </div>
				 <div class="overlayImg" > <!--TODO image cliquante -->
					<img src="<?=$data['image']; ?>" alt="">
				</div>
				</a>
			</div>
		<?php endwhile; ?>
			<!-- <div class="widget">
				<div> 
					<a class="title-rubric" href="">JAVA SCRIPT</a>
				 </div>
				<div class="overlayImg" ><img src="app/public/img/bg1.jpg" alt=""></div>
			</div> -->

		
		
		</div>



<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>