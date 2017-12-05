<?php
include('models/users.php');
include('views/headers/login.php');
?>
    <h3>Create new user</h3>
    <form id='createuser' class="form-inline" method="POST" action="index.php?user=createAction">
        <label>Login:</label><br>
        <input class="form-control" type="text" name='login' placeholder="Votre pseudo..." required="true"><br><br>
        <select multiple class="form-control" name='type[]'>
            <?php
            foreach (getUserType($bdd) as $ut) {
                echo '<option value="' . $ut['id'] . '">' . $ut['type'] . '</option>';
            }
            ?>
        </select><br><br>
        <label>Birthdate:</label><br>
        <input class="form-control" type="date" name='bdate' placeholder="0000-00-00" required="true"><br><br>
        <label>Prénom:</label><br>
        <input class="form-control" type="text" name='fname' placeholder="Votre prénom..." required="true"><br><br>
        <label>Nom:</label><br>
        <input class="form-control" type="text" name='lname' placeholder="Votre nom..." required="true"><br><br>
        <label>Mail:</label><br>
        <input class="form-control" type="email" name='mail' placeholder="Votre mail..." required="true"><br><br>
        <label>Mot de passe:</label><br>
        <input class="form-control" type=password name='pw' placeholder="Votre mot de passe..."
               required="true"><br><br>
        <input class="btn btn-primary" type="submit" value="Ajouter !">
    </form>

<?php
include('views/footers/default.php');
?>