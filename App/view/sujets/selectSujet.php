<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>


<div class="main-content">
<?= $varSelectSujet['title_sujet']; ?>
<?= $varSelectSujet['content']; ?>

<div>
<?php foreach($varCommentSujet as $data): ?>
	
	</br></br><?= ( $data['pseudo']); ?> <?=  $data['comment'];?><a href=""><i class="fas fa-exclamation-circle"></br></a>

 <?php endforeach; ?>

	
</div>


<form method="POST" action="index.php?action=ajoutComment&id=<?= $varSelectSujet['id_sujet']; ?>">
            <div class="chat-message clearfix">
                <textarea type="text" name="message" id="message" placeholder="Entrez votre commentaire"  rows="3"></textarea>
                <input class="send" type="submit" value="Envoyer">
            </div>
        </form>
</div>



<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>