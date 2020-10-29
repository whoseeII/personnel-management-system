<!-- this file will if updating user account details -->

<?php
    session_start(); //starting session
    include_once('../../class/initialize.php');

    if ( !empty($_POST['username']) &&
         !empty($_POST['new_password'])
        ) { //making sure fields are complete
        $user = new User($db);
        $user->username = $_POST["username"];
        $user->password = $_POST["new_password"];
        $user->id = $_SESSION['user-data']['id'];


        $result = $user->account_update();
        $_SESSION['transaction-status'] = $result['status'];
        $_SESSION['transaction-message'] = $result['message'];
        
        if($result['status'] == 'true') {
            $_SESSION['user-data']['username'] = $user->username;
        }

        header ("Location: /personnel-management-system/views/personnel_management.php?page=profile");
    } else { //if fields are not complete, alert message will pop up on Account Details Edit page
        $_SESSION['transaction-status'] = 'false';
        $_SESSION['transaction-message'] = 'Fields with * are required!';
        header ("Location: /personnel-management-system/views/personnel_management.php?page=account_details_edit");
    }

