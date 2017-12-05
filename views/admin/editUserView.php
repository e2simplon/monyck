<?php

if (isset($_GET['id']) && $_GET['id'] != null) {
    $user = sanitizeNumber($_GET['id']);
}
else if (isset($_POST['user'])) {
    $user = sanitizeText($_POST['user']);
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
              <h2>ID #' . $rs['id'] . '<br><input name="login" type="text" value=' . $rs['login'] . '><br></h2>';
              if (isAdmin()) {
                  echo '<h3><select multiple name="type[]" >';
        foreach (getUserType($bdd) as $rs2) {
            echo '<option value="'.$rs2['id'].'">' . $rs2['type'] . '</option>';
        }
              echo'</select><br></h3>';
              }

              echo '<h3><input name="fname" type="text" value=' . $rs['firstname'] . '><br></h3>
              <h3><input name="lname" type="text" value=' . $rs['lastname'] . '><br></h3>
              <h3><input name="bdate" type="text" value=' . $rs['birthday'] . '><br></h3>
              <h3><input name="mail" type="text" value=' . $rs['email'] . '><br></h3>
              <h3><input name="pw" type="text" value=' . $rs['password'] . '><br></h3>';
    }
    ?>
        <input type="button" value="Back" onclick="window.history.back();">
    <input type="submit" value="Save" name="save" formaction="index.php?user=editAction">
    <input type="submit" value="Cancel" name="cancel"
           formaction="<?php echo $project_path ?>index.php?user=list">
    </form>
    <?php
}
?>
