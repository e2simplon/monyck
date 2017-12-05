<?php
$id=sanitizeNumber($_POST['id']);
$tl=sanitizeText($_POST['title']);
$ds=sanitizeText($_POST['description']);
$is=$_POST['id_skill'];

editTicket($bdd,$id,$tl,$ds,$is);

$_SESSION['flash'] = '<h1>Ticket '.$_POST['title'].' édité avec succès !</h1>';

header('Location:'.$project_path.'index.php?ticket=list');

