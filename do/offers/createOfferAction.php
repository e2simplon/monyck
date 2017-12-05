<?php

$am = sanitizeNumber($_POST["amount"]);
$ex = $_POST["execTime"];
$in = sanitizeNumber($_POST["insurance"]);
$idt = sanitizeNumber($_POST["id_ticket"]);
$iuo = sanitizeNumber($_SESSION['id']);
$ids = 1; //Set 'OPEN' status

createOffer($bdd,$am,$ex,$in,$idt,$iuo,$ids);

$_SESSION['flash'] = '<h1>Offer of'.$am.' succesfully added !</h1>';

header('Location:'.$project_path.'index.php?offer=list');
