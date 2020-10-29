<?php
    session_start();
    include_once('../../class/initialize.php');

    if ( !empty($_POST['id']) ) {
        $type_and_rate = new Type_and_rate($db);
        $type_and_rate->id = $_POST["id"];

        $result = $type_and_rate->destroy();
        $_SESSION['transaction-status'] = $result['status'];
        $_SESSION['transaction-message'] = $result['message'];

        header ("Location: /personnel-management-system/views/personnel_management.php?page=type_and_rate");
    } else {
        header ("Location: /personnel-management-system/views/personnel_management.php?page=type_and_rate");
    }