<?php

$ido = sanitizeNumber($_GET['id']);
$exp = sanitizeNumber($_POST["explanation"]);
$rel = sanitizeNumber($_POST["relation"]);
$com = sanitizeNumber($_POST['comitment']);

createReport($bdd, $exp, $rel, $com, $ido);

$_SESSION['flash'] = '<h1>Offer of'.$am.' succesfully added !</h1>';

header('Location:'.$project_path.'index.php?offer=list');
