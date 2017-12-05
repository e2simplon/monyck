<?php

include('views/headers/login.php');
?>

<h4>≡
    <a href="<?php $project_name ?>index.php?transType=list">Transaction types</a> ≡
    <a href="<?php $project_name ?>index.php?transaction=create">+ Add transaction </a>

</h4>

<?php messageFlash(); ?>

<?php
require('models/transactions.php');
foreach (getTransaction($bdd) as $tt) {
    echo '<h2>#' . $tt['id'] .' '. $tt['logins'] . ' to ' . $tt['loginr'] . ' <a href="/' . $project_name . '/index.php?transaction=edit&id=' . $tt['id'] . '">✎</a>
              <a href="/' . $project_name . '/index.php?transaction=deleteAction&id=' . $tt['id'] . '">×</a></h2>
              <strong>Date:</strong><br>
              ' . $tt['transferDate'] . '<br><br>
              <strong>Amount</strong><br> ' . $tt['amount'] . ' Ⓜ<br><br>
              <strong>Transaction type:</strong><br>
              ' . $tt['type'] . '';
}


include('views/footers/default.php');
?>
