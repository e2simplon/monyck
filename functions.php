<?php

function messageFlash()
{
    if (isset($_SESSION['flash'])) {
        echo $_SESSION['flash'];
        unset($_SESSION['flash']);
    }
}


function setLists($bdd, $tableName, $displayField, $withTitle = false, $selectedId = null)
{
    if ($withTitle) {
        ?>
        <option>Select <?php echo $displayField ?></option>
        <?php
    }

    $result = $bdd->query('SELECT * FROM ' . $tableName);
    while ($row = $result->fetch_object()) {
        ?>
        <option
            <?= $selectedId == $row->id ? 'selected' : '' ?>
                value="<?= $row->id ?>"><?= $row->$displayField ?></option>
        <?php
    }
}

function checkRole($role){
    if(checkPermissions($role)){
        //OK
    }
    else{
        header('location:index.php?user=login');
    }
}

function checkPermissions($role) {
    if (isset($_SESSION['roles'])) {
        $array = $_SESSION['roles'];
        $roles = explode(",", $role);
        foreach ($roles as $rl){
            if (in_array($rl, $array)) {
                return true;
            }
        }
    }
    return false;
}

function sanitizeText($text)
{
    $string = (string)$text;
    $array = array("select","insert","delete","update");
    $string = str_ireplace($array, "", $string);
    return $string;
}

function sanitizeNumber($number)
{
    $num = (int)$number;
    return $num;
}