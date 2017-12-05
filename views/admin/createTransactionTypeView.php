<?php messageFlash(); ?>

    <h3>Create new transaction type</h3>
    <form id='createtransactiontype' class="form-inline" method="POST" action="index.php?transType=createAction">
        <input name="type" type="text" placeholder="Name your transaction type...">
        <input type="submit" name="submit" value="submit">
    </form>