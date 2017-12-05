<?php

require ('models/tickets.php');
$id=$_GET['id'];
$sk=$_POST['title'];

deleteTicket($bdd,$id);

$_SESSION['flash'] = '<h1>Ticket '.$_POST['title'].' deleted with succes !</h1>';

header('Location:/'.$project_name.'/index.php?ticket=list');

