<!DOCTYPE html>
<html lang='fr'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'>
  <link rel='stylesheet' href='./css/styleAdmin.css'>
  <script src="./js/jquery.js"></script>
  <script src="./plugin/tinymce/tinymce.min"></script>
  <script src="./plugin/tinymce/init-tinymce"></script>
  <title><?= $title ?></title>
</head>

<body>
  <header>
    <div class="navbar">
      <div class="logoContainer">
        <a href="#" class="logo">Logo</a>
      </div>
      <?php
          if (isset($_SESSION['operator']) AND !empty($_SESSION['operator'])) {
      ?>
        <ul class="nav">
          <li><a href="index.php?admin=goIndexView" class='active'>Home</a></li>
          <li> <a href="index.php?admin=goAddInsciptionAdmin">Inscription</a></li><!--TODO retirer c'est lien apres test -->
          <li><a href="index.php?admin=goLogin">Connexion</a></li> <!-- TODO retirer c'est lien apres test -->
          <li><a href="index.php?admin=goListOperator">Gestions des operateurs</a></li>
          <li><a href="index.php?admin=goListMembre">Gestion des membres</a></li>
          <li><a href="index.php?admin=goListChapter">Gestion des Chapitre</a></li>
          <li><a href="index.php?admin=goListComment">Gestions des commentaires</a></li>
          <li><a href="index.php?admin=goListAlert">Gestions des Alerts</a></li>
          <li><a href="index.php?admin=goListAlert">Mon Compte <?= $_SESSION['operator'] ?></a></li>
          <span class="deconnexion_lien"><a href="view/adDeconnexion.php">DECONNEXION</a> </span>
        </ul>
      <?php
          } else {
      ?>
       
        <div class="window_connexion">
          <!-- <span class="name_user_conneted"><?= $_SESSION['operator'] ?></span> -->
         
        </div>
      <?php
                                          } ?>
    </div>
  </header>
  <?= $content ?>
  <script src='js/admin.js'></script>
</body>

</html>