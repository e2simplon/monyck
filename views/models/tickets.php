<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 16/11/17
 * Time: 13:29
 */

//GETTERS

function getSkills ($bdd){
    $result = $bdd->query("SELECT * FROM skills");
    return $result;
};
function getOneSkill($bdd, $id) {
    $result = $bdd->query("SELECT * FROM skills WHERE id=$id");
    return $result;
};


function getUsers ($bdd){
    $result = $bdd->query("SELECT * FROM users");
    return $result;
};

function getTickets ($bdd){
    $result = $bdd->query("SELECT * FROM tickets");
    return $result;
};

function getOneTicket($bdd, $id) {
    $result = $bdd->query("SELECT * FROM tickets WHERE id=$id");
    return $result;
};

function getTicketColumnById ($bdd, $id, $column){
    $tmp = $bdd->query("SELECT * FROM tickets WHERE tickets.id='$id'");
    $result = $tmp->fetch_assoc();
    return $result[$column];
};


//SETTERS

function createSkill($bdd, $sk) {
    $bdd->query("INSERT INTO `skills` (`id`, `language`) VALUES (NULL, '$sk');");
};

function deleteSkill($bdd, $id) {
    $bdd->query("DELETE s FROM skills s WHERE s.id = $id");
};

function editSkill ($bdd, $id, $sk) {
    $bdd->query("UPDATE skills SET language = '" . $sk . "' WHERE id=$id");
};

function createTicket($bdd, $tt,$ds,$cd,$et,$idu,$ids) {
    $bdd->query("INSERT INTO tickets (title, description, creationDate, expTime, id_user, id_skill)
VALUES ('$tt','$ds','$cd','$et','$idu','$ids');");
};

function deleteTicket($bdd, $id) {
    $bdd->query("DELETE t FROM tickets t WHERE t.id = $id");
};

function editTicket($bdd,$id,$tl,$ds,$cd,$et,$iu,$is) {
    $bdd->query("UPDATE tickets SET title = '$tl', description = '$ds',creationDate = '$cd', expTime = '$et', id_user = '$iu', id_skill = '$is' WHERE tickets.id='$id'");
}
