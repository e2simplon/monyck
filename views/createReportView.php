<h3>Create new report</h3>
<form id='createoffer' class="form-inline" method="POST" action="index.php?offer=createReportAction&id=<?php echo $_GET['id'] ?>">
    <label>Explanation:</label><br>
    <input type="number" name="explanation" max="5"><br>

    <label>Relation:</label><br>
    <input type="number" name="relation" max="5"><br>

    <label>Comitment:</label><br>
    <input type="number" name="comitment" max="5"><br>

    <input class="btn btn-primary" type="submit" value="Ajouter !">
</form>
