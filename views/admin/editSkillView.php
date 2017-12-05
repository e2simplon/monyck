<?php

if (isset($_GET['id'])) {
    $skill = $_GET['id'];
} else {
    echo 'Hmm... 404 ?!';
} ?>
    <form name="skill" method="POST">
<?php
if (isset($skill)) {
    foreach (getOneSkill($bdd, $skill) as $sk) {
        echo '<input name="id" type="hidden" value=' . $sk['id'] . '>
              <h2>#' . $sk['id'] . '<input name="skill" type="text" value=' . $sk['language'] . '><br></h2>';
    }
    ?>
    <input type="button" value="Back" onclick="window.history.back();">
    <input type="submit" value="Save" name="save" formaction="index.php?skill=editAction"">
    <input type="submit" value="Delete" name="delete"
           formaction="<?php echo $project_path . 'index.php?skill=deleteAction&id=' . $sk['id'] ?>">
    </form>
    <?php
}
?>