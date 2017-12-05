<?php
include('views/headers/login.php');
require('models/users.php');

if (isset($_GET['id'])) {
    $type = $_GET['id'];
} else {
    echo 'Hmm... 404 ?!';
} ?>
    <form name="user" method="POST">
<?php
if (isset($type)) {
    foreach (getOneUserType($bdd, $type) as $ty) {
        echo '<input name="id" type="hidden" value=' . $ty['id'] . '>
              <h2>#' . $ty['id'] . '<input name="type" type="text" value=' . $ty['type'] . '><br></h2>';
    }
    ?>
    <input type="submit" value="Save" name="save" formaction="index.php?type=editAction"">
    <input type="submit" value="x Delete" name="delete"
           formaction="/<?php echo $project_name . '/index.php?type=deleteAction&id=' . $ty['id'] ?>">
    </form>
    <?php
}
include('views/footers/default.php');
?>