<?php

$id=sanitizeNumber($_GET['id']);
deleteOffer($bdd,$id);

$_SESSION['flash'] = '<h1>Offer '.$id.' succesfully deleted !</h1>';

header('Location:'.$project_path.'index.php?offer=list');

