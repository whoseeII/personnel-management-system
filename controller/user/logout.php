<?php
    session_destroy();
    session_start();
    $_SESSION['is_login'] = false;
    header ("Location: /personnel-management-system/views/personnel_management.php?page=login");