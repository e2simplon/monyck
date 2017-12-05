
<br><br>
<footer>
    <?php

    if (isset($_SESSION['login'])) {
    echo 'Logged as:<strong> ' . $_SESSION['login'].'</strong> and you have <strong>'.userBalance($bdd,$_SESSION['id']).'</strong> Ⓜ';
    } else {
    echo "You must <a href=" . $project_path . "index.php?user=login><strong>login</strong></a>";
    }
?> || © 2017
</footer>
</body>
</html>