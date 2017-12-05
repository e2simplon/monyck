<?php
include('views/headers/login.php');
require('models/users.php');

if (isset($_GET['id']) && $_GET['id'] != null) {
    $user = $_GET['id'];
} else if (isset($_POST['user'])) {
    $user = $_POST['user'];
} else {
    ?>
    <form name="edituser" method="POST">
        <select class="form-control" name='user' id="user" onchange="this.form.submit()">
            <?php setLists($bdd, 'users', 'login', true); ?>
        </select>
    </form>
<?php } ?>
    <form name="user" method="POST">
<?php
if (isset($user)) {
    foreach (getOneUser($bdd, $user) as $rs) {
        echo '<input name="id" type="hidden" value=' . $rs['id'] . '>
              <h2>#' . $rs['id'] . '<input name="login" type="text" value=' . $rs['login'] . '><br></h2>
              <h3>'.$rs['multitype'].'</h3>
              <h4>' . $rs['firstname'] . ' ' . $rs['lastname'] . '</h4>
              <h6>' . $rs['email'] . '</h6>';
    }
    ?>
    <input type="submit" value="Save" name="save" formaction="index.php?user=editAction">
    <input type="submit" value="x Delete" name="delete"
           formaction="/<?php echo $project_name . '/index.php?user=deleteAction&id=' . $rs['id'] ?>">
    </form>
    <?php
}
include('views/footers/default.php');
?>