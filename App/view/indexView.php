<?php $title = "Roman Jean Forteroche"; ?>

<?php ob_start(); ?>
<div class="container_accueil">


    <h1> Billet simple pour l'Alaska </h1>

    <div class="containerNews ">
        <?php
        while ($data = $varAllChapters->fetch()) {

        ?>

            <div class="news">
                <h3 class="title">
                    <?= htmlspecialchars($data['title']) ?>
                </h3>
                <div class="chapitre">
                    <div class="content"> <?= $data['content'] ?></div>
                   
                </div>
                <div class="linkComment">
                    <a class="btn btn1" href="index.php?action=showChapter&id=<?= $data['id'] ?>">Commentaires</a>
                </div>
            </div>
    </div>
<?php
        }
?>
</div>
<?php $varAllChapters->closeCursor(); ?>

<?php $content = ob_get_clean(); ?>

<?php require('app/view/template.php'); ?>