<?php
$id=sanitizeNumber($_GET['id']);
$tt=sanitizeText($_POST['type']);

deleteTransactionTypes($bdd,$id);

$_SESSION['flash'] = '<h1>Transaction Type '.$_POST['type'].' deleted with succes !</h1>';

header('Location:'.$project_path.'index.php?transType=list');
