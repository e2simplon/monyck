<?php

//GETTERS

function getAllUsers($bdd)
{
    $result = $bdd->query('SELECT * FROM users ORDER BY (firstname)');
    return $result;
}


function getTransaction($bdd)
{
    $result = $bdd->query("SELECT u1.login AS loginr,u2.login AS logins, t.*,tt.type FROM transactions t, users u1, users u2,transaction_types tt WHERE u1.id=t.id_receiver AND u2.id=t.id_sender AND t.id_transaction_type=tt.id
");
    return $result;
}

;


function getOneTransaction($bdd, $id)
{
    $result = $bdd->query("SELECT * FROM transactions WHERE id=$id");
    return $result;
}

;

function getSenderTransaction($bdd, $num)
{
    $result = $bdd->query("SELECT * FROM transactions WHERE id_sender=$num");
    return $result;
}

;

function getTransactionTypeList($bdd)
{
    $result = $bdd->query('SELECT * FROM transaction_types');
    return $result;
}


//SETTERS
function createTransaction($bdd, $amount, $transactionType, $comment, $id_sender, $id_receiver)
{
    $bdd->query("INSERT INTO transactions(`amount`, `comment`, `id_receiver`, `id_sender`, `id_transaction_type`) VALUES ($amount,'".$comment."', $id_receiver, $id_sender, $transactionType)");
}

;

function deleteTransaction($bdd, $id)
{
    $bdd->query("DELETE FROM transactions WHERE id = $id");
}

;

function editTransaction($bdd, $id, $amount, $transferDate, $transactionType, $comment, $id_sender, $id_receveur)
{
    $bdd->query("UPDATE transactions SET amount=$amount, transferDate='" . $transferDate . "', comment='" . $comment . "', id_receiver=$id_receveur, id_sender=$id_sender, id_transaction_type=$transactionType WHERE id=$id");
}

;


function getTransactionTypes($bdd)
{
    $result = $bdd->query("SELECT * FROM transaction_types");
    return $result;
}

;

function getOneTransactionTypes($bdd, $id)
{
    $result = $bdd->query("SELECT * FROM transaction_types WHERE id=$id");
    return $result;
}

;


//SETTERS

function createTransactionTypes($bdd, $tt)
{
    $bdd->query("INSERT INTO `transaction_types`(`type`) VALUES ('$tt')");
}

;

function deleteTransactionTypes($bdd, $id)
{
    $bdd->query("DELETE s FROM transaction_types s WHERE s.id = $id");
}

;

function editTransactionTypes($bdd, $id, $tt)
{
    $bdd->query("UPDATE transaction_types SET type = '" . $tt . "' WHERE id=$id");
}

;
