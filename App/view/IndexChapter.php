<?php $title = "Roman Jean Forteroche"; ?>

<?php ob_start(); ?>
<div class="container_accueil">
    <h1> Billet simple pour l'Alaska </h1>
    <p class="">
        <i class="fas fa-reply"></i>
        <a class="return" href="index.php">Retour à la liste des chapitres</a>
        
    </p>

    <div class="newsComment">
        <h3 class="title">
            <?= htmlspecialchars($selectionChapter['title']) ?>
        </h3>
        <div class="chapitre">
        <div class="content">  <?= $selectionChapter['content'] ?></div>
        </div>
        <h2 commment>Commentaires</h2>
        <p class="comment">
            <?php

            while ($data1 = $commentsChapter->fetch()) {
                // &idChapitre=<?=$_GET['id'] 
            ?>


                <span class='messcontent'>

                    <span class="name"> <?= htmlspecialchars($data1['pseudo']) ?> </span>:
                    <span> <?= $data1['comment'] ?> <?php if (isset($_SESSION['idUser'])) { ?><a href="index.php?action=addAlert&idUser=<?= $_SESSION['idUser'] ?>&idcomment=<?= $data1['id'] ?>"><i class="fas fa-exclamation-circle"></i></a> <?php } ?> </span><br>

                </span>

            <?php
            }
            if (isset($_SESSION['idUser'])) {

            ?>
        </p>
        <form method="POST" action="index.php?action=ajoutComment&id=<?= $chapterId ?>">
            <div class="chat-message clearfix">
                <textarea type="text" name="message" id="message" placeholder="Entrez votre commentaire"  rows="3"></textarea>
                <input class="send" type="submit" value="Envoyer">
            </div>
        </form>

    <?php
            }
    ?>
    </div>
</div>
<?php $commentsChapter->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>

<?php require('App/view/template.php'); ?>