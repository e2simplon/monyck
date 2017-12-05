<?php
$id=sanitizeNumber($_GET['id']);
deleteUserType($bdd,$id);

$_SESSION['flash'] = '<h1>Usertype deleted !</h1>';

header('Location:'.$project_path.'index.php?type=list');

