<?php
$t=sanitizeText($_POST['type']);

//Fonction createUser() exécute la requête !
createUserType($bdd,$t);
echo $t;

$_SESSION['flash'] = '<h1>Usertype '.$_POST['type'].' created with succes !</h1>';

header('Location:'.$project_path.'index.php?type=list');
