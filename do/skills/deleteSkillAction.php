<?php

$id=sanitizeNumber($_GET['id']);
$sk=sanitizeText($_POST['skill']);

deleteSkill($bdd,$id);

$_SESSION['flash'] = '<h1>Skill '.$_POST['skill'].' deleted with succes !</h1>';

header('Location:'.$project_path.'index.php?skill=list');

