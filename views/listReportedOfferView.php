<h4>
    <a href="<?php $project_path ?>index.php?offer=create">+ Add offer</a>

</h4>

<?php messageFlash(); ?>

<?php

foreach (getTicketsOffersReports($bdd) as $of) {
    echo '<hr><h4>#' . $of['id'] . ' ' . $of['title'] . '<br>
              <small>taken by ' .  getReportUser($bdd,$of['ido']) . '</small><br><br>
              ' . $of['status'] . '<br><br>
              Rewarded:<br>' . $of['amount'] . '<br>
              Allowed time<br>' . $of['execTime'] . '<br>
              Insurance:<br>' . $of['insurance'] . '<br><br>
              Explanation: ' . $of['explanation'] . '/5 <br>
              Relation: ' . $of['relation'] . '/5 <br>
              Comitment: ' . $of['comitment'] . '/5<br><br>
             <input value="View Ticket" type="button"  onclick=location.href="' . $project_path . 'index.php?ticket=view&id=' . $of['id_ticket'] . '"></h4>';
}
?>