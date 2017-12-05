<?php
include('views/headers/login.php');
require('models/transactions.php');

if (isset($_GET['id'])) {
    $transac = $_GET['id'];
} else {
    echo 'Hmm... 404 ?!';
} ?>
    <form name="transaction" method="POST">
<?php
if (isset($transac)) {
    foreach (getOneTransaction($bdd, $transac) as $tt) {
        ?>
        <input name="id" type="hidden" value="<?php echo $tt['id'] ?>">
        <h2>#<?php echo $tt['id'] ?> <input class="form-control" type="text" name="comment"
                                            value="<?php echo $tt['comment'] ?>"
                                            required="true"></h2><br><br>
            <input class="form-control" type="number" name="amount" value="<?php echo $tt['amount'] ?>"
                   required="true"><br><br>
            <label>Transfer date</label>:</label><br>
            <input class="form-control" type="date" name='transferDate' value="<?php echo date('Y-m-d'); ?>" required="true"><br><br>
            <label>Type de transaction:</label><br>
            <select class="form-control" name="transactionType">

                <?php
                foreach (getTransactionTypeList($bdd) as $ttl) {
                    echo '<option value="' . $ttl['id'] . '"> ' . $ttl['type'] . ' </option>';
                }
                ?>
            </select><br><br>

            <label>Emetteur</label><br>
            <select class="form-control" name="id_sender">
                <?php
                foreach (getAllUsers($bdd) as $aU) {

                    echo '<option value="' . $aU['id'] . '">' . $aU['firstname'] . ' ' . $aU['lastname'] . ' (' . $aU['login'] . ')</option>';

                }
                ?>
            </select><br><br>

            <label>Destinataire:</label><br>
            <select class="form-control" name="id_receveur">

                <?php
                foreach (getAllUsers($bdd) as $aU) {
                    echo '<option value="' . $aU['id'] . '">' . $aU['firstname'] . ' ' . $aU['lastname'] . ' (' . $aU['login'] . ')</option>';
                }
                ?>
            </select><br><br>

            <input type="submit" value="Save" name="save"
                   formaction="/<?php echo $project_name ?>/index.php?transaction=editAction">
            <input type="submit" value="Delete" name="delete"
                   formaction="/<?php echo $project_name . '/index.php?transaction=list&id=' . $tt['id'] ?>">
        </form>
        </form>

        <?php
    }
}
include('views/footers/default.php');
?>