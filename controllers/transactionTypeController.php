<?php
include('views/headers/default.php');
require('models/transactions.php');
require('models/users.php');

switch ($_GET['transType']) {
    case "create":
        checkRole('Banker');
        include('views/admin/createTransactionTypeView.php');
        break;

    case "edit":
        checkRole('Banker');
        include('views/admin/editTransactionTypeView.php');
        break;

    case "list":
        checkRole('Banker');
        include('views/admin/listTransactionTypeView.php');
        break;

    //Actions
    case "createAction":
        include('do/transactionTypes/createTransactionTypeAction.php');
        break;

    case "editAction":
        include('do/transactionTypes/editTransactionTypeAction.php');
        break;

    case "deleteAction":
        include('do/transactionTypes/deleteTransactionTypeAction.php');
        break;

    default:
        echo "<p style='font-size:99vh'>_404</p>";
}
include('views/footers/default.php');