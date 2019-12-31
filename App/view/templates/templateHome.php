<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-design-icons-iconfont@5.0.1/dist/material-design-icons.min.css">
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>



    <script src="App/public/js/jquery.js"></script>
    <script src="App/plugin/tinymce/tinymce.min"></script>
    <script src="App/plugin/tinymce/init-tinymce"></script>
	<link rel='stylesheet' href='App/public/css/style.css'>
    <title><?= $title ?></title>
</head>

<body>
<div class="header">
		<div class="logo">
		</div>
		<a href="#" class="nav-trigger"><span></span></a>
	</div>
<div class="side-nav">
		<div class="logo">
			<span>CyraTech</span>
		</div>	
		<nav>
	
			<ul>
				<?php if (isset($_SESSION['membre'])):?>
					<li id="connected">
				<span ><?= $_SESSION['membre']?></span>
				</li>
					<?php if ($_SESSION['powerUser'] == 0) :?>
						<li><a href="index.php?action=listComments">Profile</a></li>
						<li><a href="index.php?action=createSujet">Creer un sujet</a></li>
					<li><a href="index.php?action=deconnexion">DECONNEXION</a>
					<i class="fas fa-sign-out-alt"></i></li>
				
					<?php elseif ($_SESSION['powerUser'] == 1) :?>
						<li><a href="index.php?action=listComments">Profile</a></li>
						<li><a href="index.php?action=createSujet">Creer un sujet</a></li>
					<li><a href="index.php?action=listComments">Gestion des Commentaires</a></li>
                    <li><a href="index.php?action=listAlerts">Gestion des Alerts</a></li>
					<li>
					
					<span><i class="fas fa-sign-out-alt"></i></span>
					<span><a href="index.php?action=deconnexion">DECONNEXION</a></span>
					</li>
				

				<?php elseif ($_SESSION['powerUser'] == 2) :?>
					<li><a href="index.php?action=listComments">Profile</a></li>
					<li>
					<i class="fas fa-list-alt"></i>
					<a href="index.php?action=listChapters">Gestion des Rubrique</a>
				</li>
						<li><a href="index.php?action=listChapters">Gestion des Sujets</a></li>
					<li><a href="index.php?action=deconnexion">DECONNEXION</a></li>

					<?php elseif ($_SESSION['powerUser'] == 3) :?>
						<li><a href="index.php?action=listComments">Profile</a></li>
						<li><a href="index.php?action=createSujet">Creer un sujet</a></li>
						<li><a href="index.php?action=listMembres">Gestion des Membres</a></li>
					<li><a href="index.php?action=listComments">Gestion des Commentaires</a></li>
					<li><a href="index.php?action=listAlerts">Gestion des Alerts</a></li>
					<li><a href="index.php?action=listChapters">Gestion des Sujets</a></li>
						<li><a href="index.php?action=listChapters">Gestion des Rubrique</a></li>
					<li><a href="index.php?action=deconnexion">DECONNEXION</a></li>
				<?php endif; ?>	
			
		<?php else: ?>
			<li>
				<a href="index.php?action=connexion">
						<span><i class="fa fa-envelope"></i></span>
						<span>Connexion</span>
					</a>
				</li>
				<li>
				<a href="index.php?action=inscription">
						<span><i class="fa fa-user"></i></span>
						<span>Inscription</span>
					</a>
				</li>
				
					<?php endif; ?>	
			
			</ul>
		</nav>
	</div>

<?= $content ?>


        <script src='App/public/js/main'></script>
</body>

</html>