<?php

function getTransfersList($bdd) {
	$result = $bdd->query('SELECT * FROM transfert');
	return $result->fetch_assoc();
	}
