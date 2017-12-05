<?php

$bdd = mysqli_connect("localhost", "ludovic", "glados", "monyck");

if (!$bdd) {
    echo "Erreur de connexion MySQL" . PHP_EOL;
    exit;
}

ini_set('display_errors', 1);
$project_title = 'BANK OF MONYCKS';
//N'oubliez pas de modifier le nom du dossier du projet type /DOSSIER/
//Si vous êtes à la racine laissez vide (Hein mika !)
$project_path = '/Monycks/';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
