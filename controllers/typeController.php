<?php
include('views/headers/default.php');
require('models/users.php');

switch ($_GET['type']) {
    case "create":
        checkRole('Banker');
        include('views/admin/createUserTypeView.php');
        break;

    case "userlist":
        checkRole('Banker');
        include('views/admin/listUserTypeAndUserView.php');
        break;

    case "list":
        checkRole('Banker');
        include('views/admin/listUserTypeView.php');
        break;


    case "edit":
        checkRole('Banker');
        include('views/admin/editUserTypeView.php');
        break;

    //Actions
    case "createAction":
        include('do/usertypes/createUserTypeAction.php');
        break;

    case "editAction":
        include('do/usertypes/editUserTypeAction.php');
        break;

    case "deleteAction":
        include('do/usertypes/deleteUserTypeAction.php');
        break;

    default:
        echo "<p style='font-size:99vh'>_404</p>";
}
include('views/footers/default.php');