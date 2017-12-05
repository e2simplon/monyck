<?php

$tt=$_POST['title'];
$ds=$_POST['description'];
$idu=$_SESSION['id'];
$ids=$_POST['id_skill'];

echo $tt.' '.$ds. ' '.$idu.' '.$ids;

//Fonction createTicket() exécute la requête !
createTicket($bdd,$tt,$ds,$idu,$ids);

$_SESSION['flash'] = '<h1>Ticket '.$_POST['title'].' created with succes !</h1>';

header('Location:'.$project_path.'index.php?ticket=list');
