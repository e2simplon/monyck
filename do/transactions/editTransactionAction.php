<?php
$id=sanitizeNumber($_POST['id']);
$amount = sanitizeNumber($_POST['amount']);
$transferDate = $_POST['transferDate'];
$transactionType = sanitizeNumber($_POST['transactionType']);
$comment =sanitizeText($_POST['comment']);
$id_sender = sanitizeNumber($_POST['id_sender']);
$id_receiver = sanitizeNumber($_POST['id_receveur']);


//Fonction editTransaction() exécute la requête !
editTransaction($bdd, $id, $amount, $transferDate, $transactionType, $comment, $id_sender, $id_receiver);

$_SESSION['flash'] = '<h1>Transaction successfully edited !</h1>';

header('Location:'.$project_path.'index.php?transaction=list');


