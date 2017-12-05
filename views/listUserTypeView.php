<?php
include('views/headers/login.php');
require('models/users.php');
?>

    <h4>
        <a href="<?php $project_name ?>index.php?type=create">+ Add type</a>

    </h4>

<?php messageFlash(); ?>


<?php
foreach (getUserType($bdd) as $t) {
    echo '<h2>#' . $t['id'] . ' ' . $t['type'] . ' <a href="/' . $project_name . '/index.php?type=edit&id=' . $t['id'] . '">✎</a>
          <a href="/' . $project_name . '/index.php?type=deleteAction&id=' . $t['id'] . '">×</a></h2><br>';
}
?>
<?php
include('views/footers/default.php');
?>