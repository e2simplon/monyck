<?php


function encryptPass($pass) {

    $encrypted = password_hash("$pass", PASSWORD_DEFAULT);

    return $encrypted;
}

function decryptPass($pass,$encrypted) {
    if (password_verify("$pass", $encrypted)) {
        echo 'Le mot de passe est valide !';
    } else {
        echo 'Le mot de passe est invalide.';
    }
}

//GETTERS

//User list with usertypes and everything
function getUsers($bdd)
{
    $result = $bdd->query("SELECT * FROM users");
    return $result;
}

function getTypeByUsers($bdd,$id)
{
    $result = $bdd->query("SELECT ut.type FROM user_types ut, user_types_users utu
    WHERE ut.id=utu.id_user_type AND utu.id_user = $id ");
    return $result;
}

//Usertype only
function getUserType($bdd)
{
    $result = $bdd->query('SELECT * FROM user_types');
    return $result;
}


//User & type
function getUserByType($bdd,$id)
{
    $result = $bdd->query("SELECT u.login FROM users u, user_types_users utu
    WHERE u.id=utu.id_user AND utu.id_user_type = $id ");
    return $result;
}


//One user with type(s)
function getOneUser($bdd, $id)
{
    $result = $bdd->query("SELECT * 
    FROM users 
    WHERE id=$id");
    return $result;
}

//TYPE


function getOneUserType($bdd, $id)
{
    $result = $bdd->query("SELECT * FROM user_types WHERE id=$id");
    return $result;
}


//SETTERS

function createUser($bdd, $l, $fn, $ln, $bd, $m, $pw, $tid)
{
    $bdd->query("INSERT INTO users (login, firstname, lastname, birthday, email, password) 
            VALUES  ('" . $l . "','" . $fn . "','" . $ln . "','" . $bd . "','" . $m . "','" . encryptPass($pw) . "')");
    $uid = $bdd->insert_id;
    addTypeToUser($bdd, $uid, $tid);
}

// TYPE
function addTypeToUser($bdd, $uid, $tid)
{
    $trim = rtrim($tid, ",");
    $explode = explode(',', $trim);

    foreach ($explode as $tid) {
        $sql = $bdd->query("INSERT INTO `user_types_users`(`id_user`, `id_user_type`) VALUES ($uid,$tid)");

        if ($sql) {
            echo "it's good";

        } else
            echo "no good", mysqli_error();

    }
}


function editUser($bdd, $id, $l, $fn, $ln, $bd, $m, $pw,$tid)
{
    $bdd->query("UPDATE users 
    SET login = '" . $l . "',firstname='".$fn."',lastname='".$ln."',birthday='".$bd."',email='".$m."',password='".$pw."'
    WHERE users.id=$id");
    addTypeToUser($bdd, $id, $tid);
}

function editUserType($bdd, $id, $t)
{
    $bdd->query("UPDATE user_types SET type = '" . $t . "' WHERE id=$id");
}

//USER TYPE
function createUserType($bdd, $t)
{
    $bdd->query("INSERT INTO user_types (type) 
              VALUES ('" . $t . "')");
}

//USER DELETER

//Delete user and his type(s)
function deleteUser($bdd, $id)
{
    $bdd->query("DELETE u.*, utu.* 
    FROM users u 
    LEFT JOIN user_types_users utu
    ON u.id = utu.id_user 
    WHERE u.id = $id");
}


function deleteUserType($bdd, $id)
{
    if(getUserByType($bdd,$id)->num_rows > 0) {
        $bdd->query("DELETE ut.*,utu.* FROM user_types ut, user_types_users utu
        WHERE ut.id=$id AND utu.id_user_type=ut.id");
    }
    else{
        $bdd->query("DELETE FROM user_types
        WHERE id=$id");
    }
}

//BANK ACCOUNT

function getCredit($bdd,$id) {
    $result = $bdd->query("SELECT SUM(t.amount) AS cred, u.id FROM transactions t, users u WHERE t.id_receiver=u.id AND u.id=$id ");
    $line=$result->fetch_assoc();
    return $line['cred'];
}
function getDebit($bdd,$id) {
    $result = $bdd->query("SELECT SUM(t.amount) AS deb, u.id FROM transactions t, users u WHERE t.id_sender=u.id AND u.id=$id ");
    $line=$result->fetch_assoc();
    return $line['deb'];
}

function userBalance($bdd,$id){
    $starter=10000; //Monycks for users
    $balance = $starter +  getCredit($bdd,$id) -  getDebit($bdd,$id);
    if($balance < 0) {
        return $balance.' You must contact your banker !';
    } else {
        return $balance;
    }
}