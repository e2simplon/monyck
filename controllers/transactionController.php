<?php
include('views/headers/default.php');
require('models/users.php');
require('models/transactions.php');

switch ($_GET['transaction']) {
    case "create":
        checkRole('Customer,Banker');
        include('views/admin/createTransactionView.php');
        break;

    case "edit":
        checkRole('Banker');
        include('views/admin/editTransactionView.php');
        break;

    case "list":
        checkRole('Banker');
        include('views/admin/listTransactionView.php');
        break;


    //Actions
    case
    "createAction":
        include('do/transactions/createTransactionAction.php');
        break;

    case "editAction":
        include('do/transactions/editTransactionAction.php');
        break;

    case "deleteAction":
        include('do/transactions/deleteTransactionAction.php');
        break;

    default:
        echo "<p style='font-size:99vh'>_404</p>";
}
include('views/footers/default.php');