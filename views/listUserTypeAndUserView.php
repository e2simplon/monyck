<?php
include('views/headers/login.php');
require('models/users.php');
?>

    <h4>
        ≡ <a href="<?php $project_name ?>index.php?type=list">List all userstypes</a>
        <a href="<?php $project_name ?>index.php?type=create">+ Add new type</a>

    </h4>

<?php messageFlash(); ?>


<?php
foreach (getUserByType($bdd) as $t) {
    echo '<h2>#' . $t['id_user_type'] . ' ' . $t['type'] . ' <a href="/' . $project_name . '/index.php?type=edit&id=' . $t['id_user_type'] . '">✎</a>
          <a href="/' . $project_name . '/index.php?type=deleteAction&id=' . $t['id_user_type'] . '">×</a></h2><br>
          ' . $t['userbytype'] . '';
}
?>
    <br>
<?php
include('views/footers/default.php');
?>