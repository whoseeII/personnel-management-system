<?php

    include_once('../../class/initialize.php');
    $type_and_rate = new Type_and_rate($db);

    $result = $type_and_rate->read();

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
                'type'  => $type,
                'rate'  => $rate
            );
            array_push($datas_arr['details'], $datas);
        }

        echo json_encode($datas_arr);
    } 
    else
    {
        echo json_encode(array('status'=>false));
    }