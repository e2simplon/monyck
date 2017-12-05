<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $project_title ?></title>
    <script src="views/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="views/css/main.css">
</head>
<body>
<header>
    <h1><?php echo $project_title ?></h1>

    <h3>≡
        <a href="<?php $project_path ?>index.php">Home</a> ≡
        <a href="<?php $project_path ?>index.php?ticket=list">Tickets</a> ≡
        <a href="<?php $project_path ?>index.php?offer=list">Offers</a> ≡
        <a href="<?php $project_path ?>index.php?user=list">Users</a> ≡
        <?php if (checkPermissions('Banker')) { ?>
            <a href="<?php $project_path ?>index.php?transaction=list">Transactions</a> ≡
        <?php } else { ?>
            <a href="<?php $project_path ?>index.php?transaction=create">Transactions</a> ≡
            <?php
        }
        if (isset($_SESSION['email'])) { ?>
            <a href="<?php $project_path ?>index.php?user=logout">Logout</a> ≡
        <?php } else {
            ?>
            <a href="<?php $project_path ?>index.php?user=login">Login</a> ≡
            <?php
        } ?>
    </h3>

</header>
