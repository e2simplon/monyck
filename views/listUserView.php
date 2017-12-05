<h4>≡
    <a href="<?php $project_path ?>index.php?type=userlist">Usertypes</a> ≡
    <a href="<?php $project_path ?>index.php?user=create">Add user</a> ≡

</h4>

<?php messageFlash(); ?>

<?php
foreach (getUsers($bdd) as $rs) {
    echo '<hr><h2>#' . $rs['id'] . ' ' . $rs['login'];
    if (isset($_SESSION['login'])) {
        if ($rs['login'] == $_SESSION['login'] | checkPermissions('Banker')) {
            echo ' <a href="' . $project_path . 'index.php?user=edit&id=' . $rs['id'] . '">✎</a>
<a href="' . $project_path . 'index.php?user=deleteAction&id=' . $rs['id'] . '">×</a></h2>';
        }
    }
 echo ' <h3>'.userBalance($bdd,$rs['id']).' Ⓜ<br><br>';
    echo 'Birthdate:<br>'.$rs['birthday'] . '</h3>';
    foreach (getTypeByUsers($bdd, $rs['id']) as $rs2) {
        echo '<h3>' . $rs2['type'] . '</h3>';
    }
    echo '<h4>' . $rs['firstname'] . ' ' . $rs['lastname'] . '</h4>
              <h3>' . $rs['email'] . '</h3>';
}
?>

