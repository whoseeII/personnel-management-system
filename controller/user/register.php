<?php
    session_start();
    include_once('../../class/initialize.php');

    if ( !empty($_POST['fullname']) && !empty($_POST['username']) && !empty($_POST['password']) ) {
        $user = new User($db);
        $user->fullname = $_POST["fullname"];
        $user->username = $_POST["username"];
        $user->password = $_POST["password"];

        $result = $user->user_register();
        $_SESSION['register-status'] = $result['status'];
        $_SESSION['register-message'] = $result['message'];

        header ("Location: /nards_inventory_system/views/inventory.php?page=register&register=".$_SESSION['register-status']);
    } else {
        header ("Location: /nards_inventory_system/views/inventory.php?page=register&register=");
    }