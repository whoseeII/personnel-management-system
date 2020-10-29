<?php
    session_start();
    include_once('../../class/initialize.php');

    $user = new User($db);
    $user->username = $_POST["username"];
    $user->password = $_POST["password"];

    $result = $user->user_login();

    if ($result['status']) {
        $_SESSION['is_login'] = $result['status'];
        $_SESSION['user-data']= $result['data'];
        $_SESSION['transaction-status'] = '';
        $_SESSION['transaction-message'] = '';
        header ("Location: /personnel-management-system/views/personnel_management.php?page=dashboard");
    } else {
        header ("Location: /personnel-management-system/views/personnel_management.php?page=login&login=error");
    }
    