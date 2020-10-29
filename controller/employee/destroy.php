<?php
    session_start();
    include_once('../../class/initialize.php');

    if ( !empty($_GET['id']) ) {
        $employee = new Employee($db);
        $employee->id = $_GET["id"];


        $result = $employee->destroy();
        $_SESSION['transaction-status'] = $result['status'];
        $_SESSION['transaction-message'] = $result['message'];

        header ("Location: /personnel-management-system/views/personnel_management.php?page=all_employee");
    } else {
        header ("Location: /personnel-management-system/views/personnel_management.php?page=all_employee");
    }