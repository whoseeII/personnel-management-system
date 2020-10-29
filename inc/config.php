<?php

    //configuration of database

    $db_user = 'root';
    $db_pass = '';
    $db_name = 'personnel_management_system';

    try { //connect to database
        $db = new PDO('mysql:host=127.0.0.1;dbname='.$db_name.';charset=utf8',$db_user, $db_pass);
    } catch(PDOException $e) { //if connection failed
        die('Connection Error: '.$e->getMessage());
    }