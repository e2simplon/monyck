<?php

include('config.php');
include('functions.php');

if (isset($_GET['user']) && $_GET['user'] != null) {
    include('controllers/userController.php');
} else if (isset($_GET['type']) && $_GET['type'] != null) {
    include('controllers/typeController.php');
} else if (isset($_GET['offer']) && $_GET['offer'] != null) {
    include('controllers/offerController.php');
} else if (isset($_GET['ticket']) && $_GET['ticket'] != null) {
    include('controllers/ticketController.php');
} else if (isset($_GET['skill']) && $_GET['skill'] != null) {
    include('controllers/skillController.php');
} else if (isset($_GET['transaction']) && $_GET['transaction'] != null) {
    include('controllers/transactionController.php');
} else if (isset($_GET['transType']) && $_GET['transType'] != null) {
    include('controllers/transactionTypeController.php');
}  else {
    include('views/indexView.php');
}