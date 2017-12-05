<?php
$id=sanitizeNumber($_GET['id']);

deleteTransaction($bdd,$id);

$_SESSION['flash'] = '<h1>Transaction deleted with succes !</h1>';

header('Location:'.$project_path.'index.php?transaction=list');
