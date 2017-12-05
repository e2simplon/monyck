<?php

require ('models/tickets.php');
$id=$_POST['id'];
$tl=$_POST['title'];
$ds=$_POST['description'];
$cd=$_POST['creationDate'];
$et=$_POST['expTime'];
$iu=$_POST['id_user'];
$is=$_POST['id_skill'];

editTicket($bdd,$id,$tl,$ds,$cd,$et,$iu,$is);

$_SESSION['flash'] = '<h1>Ticket '.$_POST['title'].' édité avec succès !</h1>';

header('Location:/'.$project_name.'/index.php?ticket=list');

