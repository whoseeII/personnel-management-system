<?php
    //start session
    session_start();
    //check if login - if not value is FALSE
    $is_login = $_SESSION['is_login'] ?? false;
    if ($is_login) { // if login
        // page = value of current page - if current page is empty - value is equal to dashboard
        $page = $_SESSION['current_page'] ?? "dashboard";
        // head to this link
        header( "Location: views/personnel_management.php?page=".$page );
    } else {
        // if not login, page will redirect to login page
        header( "Location: views/personnel_management.php?page=login" );
    }