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



    <div id="wrapper">
        <div class="overlay">
            <!-- Sidebar -->


            <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
                <ul class="nav sidebar-nav ">
                    <?php
                    if (isset($_SESSION['membre'])) {
                    ?>
                        <li><a><i class="material-icons">
                                    account_circle
                                </i><?= $_SESSION['membre'] ?></a></li>
                        <li><a href="index.php?action=showChapters" class='active'><i class="material-icons">
                                    home
                                </i>Home</a></li>
                        <?php if ($_SESSION['powerUser'] == 1) { ?>
                           
                            <li><a href="index.php?action=listMembres">Gestion des Membres</a></li>
                            <li><a href="index.php?action=listChapters">Gestion des Chapitres</a></li>
                            <li><a href="index.php?action=listComments">Gestion des Commentaires</a></li>
                            <li><a href="index.php?action=listAlerts">Gestion des Alerts</a></li>
                        <?php } ?>
                        <li><a href="index.php?action=deconnexion">DECONNEXION</a></li>
                    <?php } else { ?>


                        <li><a href="index.php?action=showChapters" class='active'><i class="material-icons">
                                    home
                                </i>Home</a></li>
                        <li> <a href="index.php?action=inscription">Inscription</a></li>
                        <li><a href="index.php?action=connexion">Connexion</a></li>

                    <?php } ?>


            </nav>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                    <span class="hamb-top"></span>
                    <span class="hamb-middle"></span>
                    <span class="hamb-bottom"></span>
                </button>
                <div class="container">
                    <div class="row">
                        <div class="">

                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->






        <script src='App/public/js/main'></script>
</body>

</html>