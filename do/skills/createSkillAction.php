<?php

$sk=sanitizeText($_POST['skill']);

//Fonction createSkill() exécute la requête !
createSkill($bdd,$sk);
echo $sk;

$_SESSION['flash'] = '<h1>Skill '.$_POST['skill'].' created with succes !</h1>';

header('Location:'.$project_path.'index.php?skill=list');
