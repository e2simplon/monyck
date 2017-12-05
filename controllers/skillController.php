<?php
include('views/headers/default.php');
require('models/tickets.php');
require('models/users.php');

switch ($_GET['skill']) {
    case "create":
        checkRole('Banker');
        include('views/admin/createSkillView.php');
        break;

    case "edit":
        checkRole('Banker');
        include('views/admin/editSkillView.php');
        break;

    case "list":
        include('views/listSkillView.php');
        break;


    //Actions
    case "createAction":
        include('do/skills/createSkillAction.php');
        break;

    case "editAction":
        include('do/skills/editSkillAction.php');
        break;

    case "deleteAction":
        include('do/skills/deleteSkillAction.php');
        break;

    default:
        echo "<p style='font-size:99vh'>_404</p>";
}
include('views/footers/default.php');