<?php
    session_start();
    include_once('../../class/initialize.php');

    if ( !empty($_POST['employee_id']) &&
         !empty($_POST['mark']) &&
         !empty($_POST['date'])
        ) {
        $attendance = new Attendance($db);
        $attendance->employee_id = $_POST["employee_id"];
        $attendance->mark = $_POST["mark"];
        $attendance->date = $_POST["date"];


        $result = $attendance->store();
        echo json_encode(array(
            'status'    => $result['status'],
            'message'   => $result['message']
        ));
    } else {
        echo json_encode(array(
            'status'    => 'false',
            'message'   => 'Error creating attendance'
        ));
    }

