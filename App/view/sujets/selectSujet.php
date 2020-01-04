<?php $title = "Cyra Forums"; ?>
<?php ob_start(); ?>


<div class="main-content">
<?= $varSelectSujet['title_sujet']; ?>
<?= $varSelectSujet['content']; ?>

<div class="containerComment">
    <?php while($data = $varCommentSujet->fetch()): ?>
        
        <div  class=" comment"><?= $data['pseudo']; ?> : <?= $data['comment'];?><a href="index.php?action=addAlert&idcomment=<?= $data['id'] ?>&id_sujet=<?=$varSelectSujet['id_sujet']?>"><i class="  alert fas fa-exclamation-circle"></i></a></div>
    <?php endwhile; ?>	
</div>


<form method="POST" action="index.php?action=ajoutComment&id=<?= $varSelectSujet['id_sujet']; ?>">
            <div class="chat-message clearfix">
                <textarea type="text" name="message" id="message" placeholder="Entrez votre commentaire"  rows="3"></textarea>
                <input class="send" type="submit" value="Envoyer">
            </div>
        </form>
</div>
<?php for($i=1;$i<=$nbPage;$i++): ?>

<a href="index.php?action=goSelectSujet&id=<?=$varSelectSujet['id_sujet']; ?>&page=<?=$i;?>" ><?=$i;?></a>

<?php endfor; ?>
    <table>
       <thead>
           <tr>
               <th></th>
               <th></th>
               <tbody></tbody>
           </tr>
       </thead>
   </table>


<?php $content = ob_get_clean(); ?>
<?php require('App/view/templates/templateHome.php'); ?>