<?php
include('views/headers/default.php');

switch ($_GET['transfer']) {
    case "create":
        include ('views/createTransferView.php');
        break;

    case "list":
        include ('views/listTransferView.php');
        break;

    //Actions
    case "createAction":
        include ('views/createTransferAction.php');
        break;

    default:
        echo "<p style='font-size:99vh'>_404</p>";
}
include('views/footers/default.php');