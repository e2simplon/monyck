<h3>Create new offer</h3>
<form id='createoffer' class="form-inline" method="POST" action="index.php?offer=createAction">
    <label>Amount:</label><br>
    <input class="form-control" type="number" name='amount' placeholder="How much you want..."
           required="true"><br><br>

    <select name='id_ticket' id="ticket">
        <?php setLists($bdd, 'tickets', 'title', false); ?>
    </select>
    <br><br>
    <label>Allowed time:</label><br>
    <input class="form-control" disabled name='execTime' value="00:15:00"><br><br>
    <label>Insurance:</label><br>
    <select name="insurance">
        <option value="0">NO</option>
        <option value="1">YES</option>
    </select><br><br>
    <label>User:</label><br>
    <br><br>
    <input class="btn btn-primary" type="submit" value="Ajouter !">
</form>
