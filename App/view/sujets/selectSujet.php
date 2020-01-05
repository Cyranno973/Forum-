<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>
<div class="main-content">
    <?= $varSelectSujet['title_sujet']; ?>
    <?= $varSelectSujet['content']; ?>
    <div class="containerComment">
        <?php while ($data = $varCommentSujet->fetch()) : ?>
            <div class=" comment"><?= $data['pseudo']; ?> : <?= $data['comment']; ?><a href="index.php?action=addAlert&idcomment=<?= $data['id'] ?>&id_sujet=<?= $varSelectSujet['id_sujet'] ?>">
            <?php if (isset($_SESSION['idUser'])) : ?>
            <i class="  alert fas fa-exclamation-circle"></i></a></div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
    <?php if (isset($_SESSION['idUser'])) : ?>
        <form method="POST" action="index.php?action=ajoutComment&id=<?= $varSelectSujet['id_sujet']; ?>&page=<?=$_GET['page'];?>" name="comment">
            <div class="chat-message clearfix">
                <textarea type="text" name="message" id="message" placeholder="Entrez votre commentaire" rows="3"></textarea>
                <input class="send" type="submit" value="Envoyer">
            </div>
        </form>
        <p id="erreur"></p>
        <?php for ($i = 1; $i <= $nbPage; $i++) : ?>
            <?php if ($i == $pageCourante) : ?>
                <center> <?= $i; ?></center>
            <?php else : ?>
                <center><a href="index.php?action=goSelectSujet&id=<?= $varSelectSujet['id_sujet']; ?>&page=<?= $i; ?>"><?= $i; ?></a></center>
            <?php endif; ?>
        <?php endfor; ?>
    <?php else : ?>

    <?php endif; ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>