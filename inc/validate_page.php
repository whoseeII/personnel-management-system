<?php

    //this file will validate the page, if is_login value is FALSE, it will redirect to login page

    session_start();
    $is_login = $_SESSION["is_login"] ?? false; //if no is_login session - value will be false
    if( !$is_login ) { //if is_login is false
        $_SESSION["page"] = "login"; //set page session to login
    }