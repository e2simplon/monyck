<h4>≡
    <a href="<?php $project_path ?>index.php?skill=list">Skills</a> ≡
    <a href="<?php $project_path ?>index.php?ticket=create">+ Add ticket</a> ≡

</h4>

<?php messageFlash(); ?>

<?php
foreach (getTickets($bdd) as $tk) {
    echo '<hr><h2>#' . $tk['id'] . ' ' . $tk['title'];
    if (isset($_SESSION['login'])) {
        if ($tk['login'] == $_SESSION['login'] | checkPermissions('Banker')) {
            echo' <a href="' . $project_path . 'index.php?ticket=edit&id=' . $tk['id'] . '">✎</a>
          <a href="' . $project_path . 'index.php?ticket=deleteAction&id=' . $tk['id'] . '">×</a>';
        }
    }

          echo '</h2>'.$tk['description'] . '<br><br>
          <strong>Creation date:</strong><br>' . $tk['creationDate'] .'<br>
          <strong>Expiration time:</strong><br>' . $tk['expTime'] .'<br><br>
          <strong>Skills:</strong><br>' . $tk['language'] .'<br><br>
          <strong>Posted by:</strong><br>'.$tk['login'].'';
}
?>
