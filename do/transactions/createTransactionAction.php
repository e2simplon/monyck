<?php

$amount = sanitizeText($_POST['amount']);
$transactionType = sanitizeNumber($_POST['transactionType']);
$comment = sanitizeText($_POST['comment']);
$id_sender = sanitizeNumber($_POST['id_sender']);
$id_receiver = sanitizeNumber($_POST['id_receiver']);

//Fonction createTransaction() exécute la requête !
createTransaction($bdd, $amount, $transactionType, $comment, $id_sender, $id_receiver);

$_SESSION['flash'] = '<h1>Transaction '.$_POST['comment'].' créé avec succès !</h1>';
 if (isAdmin()) {
     header('Location:' . $project_path . 'index.php?transaction=list');
 } else {
     header('Location:'.$project_path.'index.php?user=list');
 }



