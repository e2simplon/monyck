<?php
$id=sanitizeNumber($_GET['id']);
$sk=sanitizeText($_POST['title']);

deleteTicket($bdd,$id);

$_SESSION['flash'] = '<h1>Ticket '.$_POST['title'].' deleted with succes !</h1>';

header('Location:'.$project_path.'index.php?ticket=list');

