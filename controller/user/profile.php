<?php
    session_start();
    include_once('../../class/initialize.php');
    $user = new User($db);
    $user->id = $_SESSION['user-data']['employee_id'];
    $result = $user->profile();
    $num = $result->rowCount();

    if($num > 0)
    {
        $datas_arr = array();
        $datas_arr['status'] = true;
        $datas_arr['details'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $datas = array(
                'id'            => $id,
                'fullname'      => $fullname,
                'type'          => $type,
                'rate'          => $rate,
                'address'       => $address,
                'gender'        => $gender,
                'marital'       => $marital,
                'email'         => $email,
                'mobile'        => $mobile,
                'join_date'     => $join_date,
                'photo'         => $photo
            );
            array_push($datas_arr['details'], $datas);
        }

        echo json_encode($datas_arr);
    } 
    else
    {
        echo json_encode(array('status'=>false));
    }