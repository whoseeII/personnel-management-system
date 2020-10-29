<?php

    include_once('../../class/initialize.php');
    $dashboard = new Dashboard($db);

    $table = htmlspecialchars(strip_tags($_POST['table']));
    $type = htmlspecialchars(strip_tags($_POST['type']));
    echo $dashboard->total($table, $type);