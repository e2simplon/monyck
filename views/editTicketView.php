<?php

if (isset($_GET['id'])) {
    $ticket = $_GET['id'];
} else {
    echo 'Hmm... 404 ?!';
} ?>
    <form name="ticket" method="POST">
<?php
if (isset($ticket)) {
    foreach (getOneTicket($bdd, $ticket) as $rs) {
        echo '<input name="id" type="hidden" value=' . $rs['id'] . '>
              <h2>#' . $rs['id'] . '<input name="title" type="text" value=' . $rs['title'] . '><br>';
        echo '<textarea name="description" >' . $rs['description'] . '</textarea><br>';
        echo '<select name="id_skill">';
        setLists($bdd, 'skills', 'language');
        echo '</select><br>';

    }
    ?>
    <input type="button" value="Back" onclick="window.history.back();">
    <input type="submit" value="Save" name="save" formaction="index.php?ticket=editAction">
    <input type="submit" value="Delete" name="delete"
           formaction="<?php echo $project_path . 'index.php?ticket=deleteAction&id=' . $rs['id'] ?>">

    </form>
    <?php
}
?>