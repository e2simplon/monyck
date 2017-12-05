<?php
include('models/users.php');
include('views/headers/login.php');
?>
    <h3>Create new user type</h3>
    <form id='createusertype' class="form-inline" method="POST" action="index.php?type=createAction">
        <input name="type" type="text" placeholder="Name your type...">
        <input type="submit" name="submit" value="submit">
    </form>

<?php
include('views/footers/default.php');
?>