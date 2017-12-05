<?php

include ('models/users.php');
include('views/headers/default.php');


if (isset($_SESSION['email'])) {
    echo 'Hello ' . $_SESSION['login'].'<br>';
} else {
    echo "Hello... you must <a href=" . $project_path . "index.php?user=login><strong>login</strong></a>";
}

echo '<br><br>Demo admin account:<br> <b>admin@admin.com</b><br>123456';
echo '<br><br>Demo user account:<br> <b>user@user.com</b><br>123456';
include('views/footers/default.php');