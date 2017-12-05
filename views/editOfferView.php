<?php

if (isset($_GET['id']) && $_GET['id'] != null) {
    $offer = $_GET['id'];
} else if (isset($_POST['offer'])) {
    $offer = $_POST['offer'];
} else {
    ?>
    <form name="editoffer" method="POST">
        <select class="form-control" name='offer' id="offer" onchange="this.form.submit()">
            <?php setLists($bdd, 'offers', 'id', true); ?>
        </select>
    </form>
<?php } ?>
    <form name="user" method="POST">
<?php
if (isset($offer)) {
    foreach (getOneOffer($bdd, $offer) as $of) {
        echo '<input name="id" type="hidden" value=' . $offer . '>
              <h2>#' . $offer .' on '. $of['title'] .'</h2>
              <small>by ' . $of['login'] . '</small><br><br>
              <label>Amount:</label><br>
              <input name="amount" type="number" value=' . $of['amount'] . '><br>
              <label>Allowed time:</label><br>
              <input name="execTime" type="text" value=' . $of['execTime']. '><br>
              <label>Insurance:</label><br>
              <select class="form-control" name="insurance">
              <option value="0">NO</option>
              <option value="1">YES</option>
              </select>';
              ?>
        <br>
        <label>Status:</label><br>
        <select class="form-control" name="status" id="status">
            <?php setLists($bdd, 'status', 'status', false); ?>
        </select><br><br>
        <?php
    }
    ?>
    <input type="button" value="Back" onclick="window.history.back();">
    <input type="submit" value="Save" name="save" formaction="<?php echo $project_path ?>index.php?offer=editAction">
    <input type="submit" value="x Delete" name="delete"
           formaction="<?php echo $project_path . 'index.php?offer=deleteAction&id=' . $offer ?>">
    </form>
    <?php
}

?>