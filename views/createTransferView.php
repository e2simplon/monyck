<?php
include ('views/headers/default.php');
?>

    <h3>Transferts</h3>
    <form id='createtransfer' class="form-inline" method="POST">

        <label>Receiver:</label><br>
        <select class="form-control" name='receiver'></select><br><br>
        <label>Amount:</label><br>
        <input class="form-control" name='amount' placeholder="Montant..."><br><br>

        <input class="btn btn-primary" type="submit" value="Ajouter !">
    </form>


<?php
include ('views/footers/default.php');
?>