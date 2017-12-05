<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 16/11/17
 * Time: 13:28
 */

require ('models/tickets.php');

$tt=$_POST['title'];
$ds=$_POST['description'];
$cd=$_POST['creationdate'];
$et=$_POST['exptime'];
$idu=$_POST['id_user'];
$ids=$_POST['id_skill'];

//Fonction createTicket() exécute la requête !
createTicket($bdd,$tt,$ds,$cd,$et,$idu,$ids);

$_SESSION['flash'] = '<h1>Ticket '.$_POST['title'].' created with succes !</h1>';

header('Location:/'.$project_name.'/index.php?ticket=list');
