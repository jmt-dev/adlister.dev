<!--Page for single advertisement -->
<?php
//require "../views/home.php";
//require "index.php";
//require "../partials/navbar.php";
//require "../utils/Input.php";


?>
<div>
	<img src=<?= "../img/{$ad->id}.jpg" ?> alt="">
	<h1><?=$ad->title; ?></h1>
	<p><?=$ad->date_created; ?></p>
	<p><?=$ad->description; ?></p>
</div>


