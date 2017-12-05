<?php
include('views/headers/default.php');
require('models/users.php');


switch ($_GET['user']) {

    case "create":
        checkRole('Banker');
        include('views/admin/createUserView.php');
        break;

    case "edit":
        if ($_SESSION['id'] === $_GET['id'] | isAdmin()) {
            include('views/admin/editUserView.php');
        }
        break;
    case "list":
        include('views/listUserView.php');
        break;

    case "logout":
        session_destroy();
        header('Location:index.php');
        break;

    case "login":
        include('views/loginUserView.php');
        break;

    //Actions
    case "loginUserAction":
        include('models/login.php');
        include('do/users/loginUserAction.php');
        break;

    case "createAction":
        include('do/users/createUserAction.php');
        break;

    case "editAction":
        include('do/users/editUserAction.php');
        break;

    case "deleteAction":
        include('do/users/deleteUserAction.php');
        break;

    default:
        echo "<p style='font-size:99vh'>_404</p>";
}

include('views/footers/default.php');
