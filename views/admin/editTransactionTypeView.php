<?php

if (isset($_GET['id'])) {
    $idtransactiontype = $_GET['id'];
} else {
    echo 'Hmm... 404 ?!';
} ?>
    <form name="transactiontype" method="POST">
<?php
if (isset($idtransactiontype)) {
    foreach (getOneTransactionTypes($bdd, $idtransactiontype) as $tt) {
        echo '<input name="id" type="hidden" value=' . $tt['id'] . '>
              <h2>#' . $tt['id'] . '<input name="type" type="text" value=' . $tt['type'] . '><br></h2>';
    }
    ?>
    <input type="button" value="Back" onclick="window.history.back();">
    <input type="submit" value="Save" name="save" formaction="index.php?transType=editAction"">
    <input type="submit" value="Delete" name="delete" formaction="<?php echo $project_path.'index.php?transType=deleteAction&id='.$tt['id'] ?>">
    </form>
    <?php
}
?>