<h4>
    <a href="<?php $project_path ?>index.php?offer=reported">Reported</a>
    <a href="<?php $project_path ?>index.php?offer=create">+ Add offer</a>

</h4>

<?php messageFlash(); ?>

<?php


foreach (getTicketsOffers($bdd) as $of) {
    echo '<hr><h2>Offer on ' . $of['title'];
    if (isset($_SESSION['login'])) {
        if ($of['login'] == $_SESSION['login'] | isAdmin()) {
            echo ' <a href="' . $project_path . 'index.php?offer=edit&id=' . $of['ido'] . '">✎</a>
                    <a href="' . $project_path . 'index.php?offer=deleteAction&id=' . $of['ido'] . '">×</a>';
        }
    }
    echo '</h2><br>Posted by <strong>' . $of['login'] . '</strong>
              <h6>' . $of['status'] . '</h6>
              <h2>Reward:<br>' . $of['amount'] . '</h2>
              <h3>Allowed time<br>' . $of['execTime'] . '</h3>
              <h4>Insurance:<br>';
    if ($of['insurance'] === '0') {
        echo 'NO';
    } else {
        echo 'YES';
    }
    echo '</h4>
              <h6><input value="View Ticket" type="button"  onclick=location.href="' . $project_path . 'index.php?ticket=view&id=' . $of['id_ticket'] . '"></h6>';
    if ($of['status'] !== 'OPEN') {
        if(isReported($bdd,$of['ido'])) {
            echo '<h6><input type="button" value="View report" onclick=location.href="' . $project_path . 'index.php?offer=viewreport&id=' . $of['ido'] . '"></h6>';
        } else {
            echo '<h6><input type="button" value="Add report" onclick=location.href="' . $project_path . 'index.php?offer=report&id=' . $of['ido'] . '"></h6>';
        }
    }


}
?>