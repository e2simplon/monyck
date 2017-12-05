<?php
$type = sanitizeText($_POST['type']);

//Fonction createTransactionTypes() exécute la requête !
createTransactionTypes($bdd, $type);

$_SESSION['flash'] = '<h1>Transaction type '.$_POST['type'].' créé avec succès !</h1>';

header('Location:'.$project_path.'index.php?transType=list');



