<?php

$_SESSION['flash'] = '<h1>Transfert effectué !</h1>';

header('Location:/'.$project_name.'/index.php?transfer=list');
