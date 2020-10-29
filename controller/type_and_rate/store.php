<?php
    session_start();
    include_once('../../class/initialize.php');

    if ( !empty($_POST['type']) && !empty($_POST['rate']) ) {
        $type_and_rate = new Type_and_rate($db);
        $type_and_rate->type = $_POST["type"];
        $type_and_rate->rate = $_POST["rate"];

        $result = $type_and_rate->store();
        $_SESSION['transaction-status'] = $result['status'];
        $_SESSION['transaction-message'] = $result['message'];

        header ("Location: /personnel-management-system/views/personnel_management.php?page=type_and_rate");
    } else {
        $_SESSION['transaction-status'] = 'false';
        $_SESSION['transaction-message'] = 'Please provide Type and Rate per Hour!';
        header ("Location: /personnel-management-system/views/personnel_management.php?page=type_and_rate");
    }