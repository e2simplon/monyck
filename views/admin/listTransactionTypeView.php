<h4>≡
    <a href="<?php $project_path ?>index.php?transType=list">Transaction types</a> ≡
    <a href="<?php $project_path ?>index.php?transType=create">+ Add transaction types</a> ≡


</h4>

<?php messageFlash(); ?>

<?php
foreach (getTransactionTypes($bdd) as $tt) {
    echo '<h2>#'.$tt['id'].' '.$tt['type'].' <a href="'.$project_path.'index.php?transType=edit&id='.$tt['id'].'">✎</a>
          <a href="'.$project_path.'index.php?transType=deleteAction&id='.$tt['id'].'">×</a></h2>';
}
