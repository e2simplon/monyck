<?php
$id=sanitizeNumber($_POST['id']);
$tt=sanitizeText($_POST['type']);

//Fonction createTransactionType() exécute la requête !
editTransactionTypes($bdd,$id,$tt);


$_SESSION['flash'] = '<h1>Transaction Type '.$_POST['type'].' created with succes !</h1>';

header('Location:'.$project_path.'index.php?transType=list');


