<?php

$id=sanitizeNumber($_POST['id']);
$sk=sanitizeText($_POST['skill']);


editSkill($bdd,$id,$sk);

$_SESSION['flash'] = '<h1>Skill '.$_POST['skill'].' édité avec succès !</h1>';

header('Location:'.$project_path.'index.php?skill=list');


