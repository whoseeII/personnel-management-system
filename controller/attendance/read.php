
<?php

include_once('../../class/initialize.php');
$attendance = new Attendance($db);
$attendance->date = $_GET['filter_date'];
$result = $attendance->read();

$num = $result->rowCount();

if($num > 0)
{
    $datas_arr = array();
    $datas_arr['status'] = true;
    $datas_arr['details'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $datas = array(
            'id'    => $id,
            'employee_id'  => $employee_id,
            'mark'  => $mark,
            'date'  => $date,
            'time'  => $time,
            'fullname'  => $fullname
        );
        array_push($datas_arr['details'], $datas);
    }

    echo json_encode($datas_arr);
} 
else
{
    echo json_encode(array('status'=>false));
}