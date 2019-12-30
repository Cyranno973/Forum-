<?php $title = "Roman Jean Forteroche"; ?>

<?php ob_start(); ?>

echo 'lol';
<div id="meteo">
<span id="humidity"></span>
<span id="condition"></span>
<div><img id="icon" src="" alt=""></div>
<span id="date"></span>
<span id="day_long"></span>
<span id="tmp"></span>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('App/view/template.php'); ?>