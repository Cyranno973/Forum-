<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>

<div class="header">
		<div class="logo">
			<i class="fa fa-tachometer"></i>
			<span>Brand</span>
		</div>
		<a href="#" class="nav-trigger"><span></span></a>
	</div>

	<div class="main-content">
		<div class="title">
		Bienvenue !
		Les forums de CyraTech sont dédiés aux professionnels de l'informatique, et au débutant.
		</div>
		<div class="main">


			<div class="widget">
			<a href="">
				<div> 
					<a class="title-rubric" href="">HTML CSS</a>
				 </div>
				 <div class="overlayImg" > <!--TODO image cliquante -->
					<img src="app/public/img/bg.jpg" alt="">
				</div>
				</a>
			</div>
			<div class="widget">
				<div> 
					<a class="title-rubric" href="">JAVA SCRIPT</a>
				 </div>
				<div class="overlayImg" ><img src="app/public/img/bg1.jpg" alt=""></div>
			</div>

			<!-- <div class="widget">
			<div > 
				<a class="title-rubric" href="">JAVA SCRIPT</a> 
			</div>
			<div class="overlayImg" ></div>
				<div class="chart"></div>
			</div> -->
		
		</div>



<?php $content = ob_get_clean(); ?>
<?php require('templates/templateHome.php'); ?>