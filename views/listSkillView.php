
<h4>
    <a href="<?php $project_path ?>index.php?skill=create">+ Add skill</a>
</h4>

<?php messageFlash(); ?>

<?php
foreach (getSkills($bdd) as $sk) {
    echo '<h2>#' . $sk['id'] . ' ' . $sk['language'];

        if (checkPermissions('Banker')) {
    echo '<a href="' . $project_path . 'index.php?skill=edit&id=' . $sk['id'] . '">✎</a>
          <a href="' . $project_path . 'index.php?skill=deleteAction&id=' . $sk['id'] . '">×</a></h2>';
        }
}
?>

