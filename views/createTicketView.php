<form method="post" action="index.php?ticket=createAction">

    <p>
        <label for="title">Title:</label><br>
        <input type="text" name="title" id="title">
    </p>

    <p>
        <label for="description">Description:</label><br>
        <textarea type="text" name="description" id="description"></textarea>
    </p>

    <label>Skills:</label><br>
    <select name='id_skill' id="id_skill">
        <?php setLists($bdd, 'skills', 'language', false); ?>
    </select>
    <br><br>


<br><br>


    <input type="submit" value="submit">

</form>
