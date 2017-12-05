<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 16/11/17
 * Time: 13:26
 */

switch ($_GET['ticket']) {
    case "create":
        include ('views/createTicketView.php');
        break;

    case "edit":
        include ('views/editTicketView.php');
        break;

    case "list":
        include ('views/listTicketView.php');
        break;


    //Actions
    case "createAction":
        include ('do/tickets/createTicketAction.php');
        break;

    case "editAction":
        include ('do/tickets/editTicketAction.php');
        break;

    case "deleteAction":
        include ('do/tickets/deleteTicketAction.php');
        break;

    default:
        echo "<p style='font-size:99vh'>_404</p>";
}

