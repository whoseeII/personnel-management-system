<?php
    session_start();
    include_once('../../class/initialize.php');

    if ( !empty($_POST['fullname']) &&
         !empty($_POST['type']) &&
         !empty($_POST['rate']) &&
         !empty($_POST['address']) &&
         !empty($_POST['gender']) &&
         !empty($_POST['marital']) &&
         !empty($_POST['email']) &&
         !empty($_POST['mobile']) &&
         !empty($_POST['join_date'])
        ) {
        $employee = new Employee($db);
        $employee->fullname = $_POST["fullname"];
        $employee->type = $_POST["type"];
        $employee->rate = $_POST["rate"];
        $employee->address = $_POST["address"];
        $employee->gender = $_POST["gender"];
        $employee->marital = $_POST["marital"];
        $employee->email = $_POST["email"];
        $employee->mobile = $_POST["mobile"];
        $employee->join_date = $_POST["join_date"];
        $employee->photo_cont = $_FILES["photo"];
        $employee->id = $_GET['id'];


        $result = $employee->update();
        $_SESSION['transaction-status'] = $result['status'];
        $_SESSION['transaction-message'] = $result['message'];


        header ("Location: /personnel-management-system/views/personnel_management.php?page=employee_view&id=".$employee->id);
    } else {
        $_SESSION['transaction-status'] = 'false';
        $_SESSION['transaction-message'] = 'Fields with * are required!';
        header ("Location: /personnel-management-system/views/personnel_management.php?page=employee_edit&id=".$_GET['id']);
    }

