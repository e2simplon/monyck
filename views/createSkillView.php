<?php
include('models/tickets.php');
include('views/headers/login.php');
?>
    <h3>Create new skill</h3>
    <form id='createskill' class="form-inline" method="POST" action="index.php?skill=createAction">
        <input name="skill" type="text" placeholder="Name your skill...">
        <input type="submit" name="submit" value="submit">
    </form>

<?php
include('views/footers/default.php');
?>