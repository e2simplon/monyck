<?php
$id=sanitizeNumber($_GET['id']);
deleteUser($bdd,$id);

$_SESSION['flash'] = '<h1>User '.$_POST['login'].' supprimé avec succès !</h1>';

header('Location:'.$project_path.'index.php?user=list');

