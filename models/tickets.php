<?php


//GETTERS

function getOneSkill($bdd, $id) {
    $result = $bdd->query("SELECT * FROM skills WHERE id=$id");
    return $result;
};


function getTickets ($bdd){
    $result = $bdd->query("SELECT u.login, t.*,s.language 
FROM users u, tickets t, skills s 
WHERE u.id=t.id_user_ticket 
AND t.id_skill=s.id");
    return $result;
};

function getOneTicket($bdd, $id) {
    $result = $bdd->query("SELECT u.login, t.*,s.language 
FROM users u, tickets t, skills s 
WHERE u.id=t.id_user_ticket 
AND t.id_skill=s.id
 AND t.id=$id");
    return $result;
};


function getTicketColumnById ($bdd, $id, $column){
    $tmp = $bdd->query("SELECT * FROM tickets WHERE tickets.id='$id'");
    $result = $tmp->fetch_assoc();
    return $result[$column];
};

function getSkills($bdd)
{
    $result = $bdd->query('SELECT * FROM skills ');
    return $result;
}

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

function createTicket($bdd, $tt,$ds,$idu,$ids) {
    $bdd->query("INSERT INTO tickets (title, description, id_user_ticket, id_skill)
VALUES ('".$tt."','".$ds."',$idu,$ids);");
};



function deleteTicket($bdd, $id) {
    $bdd->query("DELETE FROM offers WHERE id_ticket=$id");
    $bdd->query("DELETE FROM tickets WHERE id = $id");
};

function editTicket($bdd,$id,$tl,$ds,$is) {
    $bdd->query("UPDATE tickets SET title = '$tl', description = '$ds', id_skill = '$is' WHERE tickets.id='$id'");
}
