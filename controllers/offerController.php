<?php
include('views/headers/default.php');
require('models/offers.php');
require('models/users.php');

switch ($_GET['offer']) {
    case "create":
        checkRole('Customer,Banker');
        include('views/createOfferView.php');
        break;

    case "edit":
        checkRole('Customer,Banker');
        include('views/editOfferView.php');
        break;

    case "view":
        checkRole('Customer,Banker');
        include('views/viewOfferView.php');
        break;

    case "viewreport":
        checkRole('Customer,Banker');
        include('views/viewReportView.php');
        break;

    case "list":
        checkRole('Customer,Banker');
        include('views/listOfferView.php');
        break;

    case "report":
        checkRole('Customer,Banker');
        include('views/createReportView.php');
        break;

    case "reported":
        checkRole('Customer,Banker');
        include('views/listReportedOfferView.php');
        break;

    //Actions
    case "createAction":
        include('do/offers/createOfferAction.php');
        break;

    case "createReportAction":
        include('do/offers/createReportAction.php');
        break;


    case "editAction":
        include('do/offers/editOfferAction.php');
        break;

    case "deleteAction":
        include('do/offers/deleteOfferAction.php');
        break;

    default:
        echo "<p style='font-size:99vh'>_404</p>";
}
include('views/footers/default.php');