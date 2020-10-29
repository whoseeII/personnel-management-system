<?php
    // validate page
    require_once('../inc/validate_page.php');

    //set session page to the value of page variable in URL
    $_SESSION["page"] = $_GET["page"];
    // get value of session page and store to $page variable
    $page = $_SESSION["page"];
    // get print variable in URL - if no print found in URL value will be FALSE
    $is_print = $_GET["print"] ?? false;
    // get is_login session - if no is_login sesion value will be FALSE
    $is_login = $_SESSION['is_login'] ?? false;

    // include header file
    include("./template/header.php");

    // declare all pages and store in constant variable PAGES
    define('PAGES', ['login', 'dashboard', 'add_new_employee', 'type_and_rate', 'all_employees', 'employee_view', 'employee_edit', 'profile', 'account_details_edit', 'view_attendance', 'check_attendance'] );

    ?>

    <body class="hold-transition
            <?php
                if ($is_login) {
                    if ($is_print) {
                        echo 'sidebar-collapse layout-top-nav';
                    } else if ($_SESSION['user-data']['role'] == 2) {
                        echo 'layout-top-nav';
                    } else {
                        echo 'sidebar-mini';
                    }
                } else {
                    echo 'login-page';
                }
            ?>
            ">
        <?php
            if( in_array($page, PAGES) ) { //check if page in URL exists in PAGES
                if ( $is_login ) { // if is_login is true
                    if($page === 'login' || $page === 'register') { //if true will redirect on the current_page
                        header("Location: ?page=".$_SESSION["current_page"]);
                    } else { //if false - page is valid
                        $_SESSION['current_page'] = $page; //set current page to page
                        ?>
                            <div class="wrapper">
                                <?php 
                                    if ($_SESSION['user-data']['role'] == 1) {
                                        include("./template/admin-topbar.php"); //include topbar file
                                        include("./template/sidebar.php"); //include sidebar file

                                        ?>

                                        <div class="content-wrapper">
                                            <div class="content-header">
                                                <div class="container-fluid">
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6">
                                                            <?php
                                                                if($is_print) //if print page
                                                                {
                                                                    ?>
                                                                        <h1 class="m-0 text-dark text-capitalize">Download <?= implode(" ", explode("_", $page)) ?></h1>
                                                                    <?php
                                                                }
                                                                else //if normal page
                                                                {
                                                                    ?>
                                                                        <h1 class="m-0 text-dark text-capitalize"><?= implode(" ", explode("_", $page)) ?></h1>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <ol class="breadcrumb float-sm-right">
                                                                <?php 
                                                                if($_SESSION["page"] === "dashboard") { //if page is equal to dashboard
                                                                    echo "<li class='breadcrumb-item active'>Dashboard</li>";
                                                                } else {
                                                                    if($is_print) { //if print page
                                                                        echo "<li class='breadcrumb-item'><a href='?page=dashboard'>Dashboard</a></li><li class='breadcrumb-item text-capitalize'><a href='?page=".$page."'>".implode(" ", explode("_", $page))."</a></li><li class='breadcrumb-item active text-capitalize'>Download</li>";
                                                                    } else { //if normal page
                                                                        echo "<li class='breadcrumb-item'><a href='?page=dashboard'>Dashboard</a></li><li class='breadcrumb-item active text-capitalize'>".implode(" ", explode("_", $page))."</li>";
                                                                    }
                                                                }
                                                                
                                                                ?>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <section class="content">
                                                <div class="container-fluid">
                                                
                                                <?php
                                                    if($is_print)  //if print page - will include print page file
                                                    {
                                                        switch ($page) {
                                                            case 'all_employees':
                                                                include('./pages/employee/print/employees_download.php');
                                                                break;
                                                            case 'view_attendance':
                                                                include('./pages/attendance/print/attendance_download.php');
                                                                break;
                                                        }
                                                    }
                                                    else  // if normal page - will include normal page file
                                                    {
                                                        switch ($page) {
                                                            case 'dashboard':
                                                                include('./pages/dashboard.php');
                                                                break;
                                                            case 'add_new_employee':
                                                                include('./pages/employee/add_new_employee.php');
                                                                break;
                                                            case 'type_and_rate':
                                                                include('./pages/employee/type_and_rate.php');
                                                                break;
                                                            case 'all_employees':
                                                                include('./pages/employee/all_employees.php');
                                                                break;
                                                            case 'employee_view':
                                                                include('./pages/employee/employee_view.php');
                                                                break;
                                                            case 'employee_edit':
                                                                include('./pages/employee/employee_edit.php');
                                                                break;
                                                            case 'check_attendance':
                                                                include('./pages/attendance/check_attendance.php');
                                                                break;
                                                            case 'view_attendance':
                                                                include('./pages/attendance/view_attendance.php');
                                                                break;
                                                            case 'dashboard':
                                                                include('./pages/dashboard.php');
                                                                break;
                                                        }
                                                    }
                                                ?>

                                                </div>
                                            </section>
                                        </div>

                                        <?php
                                    } else if ($_SESSION['user-data']['role'] == 2) {
                                        include("./template/user-topbar.php"); //include topbar file
                                        ?>

                                        <div class="content-wrapper">
                                            <div class="content-header">
                                                <div class="container">
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6">
                                                            <h1 class="m-0 text-capitalize"><?= implode(" ", explode("_", $page)) ?></h1>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <ol class="breadcrumb float-sm-right">
                                                                <?php 
                                                                    if($_SESSION["page"] === "home") { //if page is equal to home
                                                                        echo "<li class='breadcrumb-item active'>Home</li>";
                                                                    } else {
                                                                        echo "<li class='breadcrumb-item'><a href='?page=home'>Home</a></li><li class='breadcrumb-item active text-capitalize'>".implode(" ", explode("_", $page))."</li>";
                                                                    }
                                                                    
                                                                    ?>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="content">
                                                <div class="container">
                                                    <?php
                                                        switch ($page) {
                                                            case 'profile':
                                                                include('./pages/user/profile.php');
                                                                break;
                                                            case 'account_details_edit':
                                                                include('./pages/user/account_details_edit.php');
                                                                break;
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                ?>
                            </div>

                        <?php
                        
            
                    }
                } else { 
                    if( $page === "login" ) {
                        $_SESSION['current_page'] = $page;
                        include('./pages/login.php');
                    } elseif ($page === 'register') {
                        $_SESSION['current_page'] = $page;
                        include('./pages/register.php');
                    } else {
                        header("Location: ?page=".$_SESSION['current_page']);
                    }
                }
            } else {
                header("Location: ?page=".$_SESSION['current_page']);
            }
        ?>
        
        <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/plugins/chart.js/Chart.min.js"></script>
        <script src="../assets/plugins/sparklines/sparkline.js"></script>
        <script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
        <script src="../assets/plugins/moment/moment.min.js"></script>
        <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- <script src="../assets/dist/js/pages/dashboard.js"></script> -->
        <script src="../assets/plugins/sweetalert2/sweetalert2.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/toastr/toastr.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/jsgrid/demos/db.js"></script>
        <script src="../assets/plugins/jsgrid/jsgrid.min.js"></script>
        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="../assets/plugins/jszip/jszip.min.js"></script>
        <script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <script src="../assets/dist/js/adminlte.js"></script>
        <script src="../assets/dist/js/demo.js"></script>
        <script src="../assets/js/drag_drop_image.js" type="text/javascript"></script>
        <script src="../assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <script>
            
        </script>

        <?php
            if($is_login) {
                if ( $_SESSION['user-data']['role'] == 1) {
                    switch ($page) {
                        case 'type_and_rate':
                            include('./pages/employee/script/type_and_rate_script.php');
                            break;
                        case 'add_new_employee':
                            include('./pages/employee/script/add_new_employee_script.php');
                            break;
                        case 'all_employees':
                            include('./pages/employee/script/all_employees_script.php');
                            break;
                        case 'employee_view':
                            include('./pages/employee/script/employee_view_script.php');
                            break;
                        case 'employee_edit':
                            include('./pages/employee/script/employee_edit_script.php');
                            break;
                        case 'check_attendance':
                            include('./pages/attendance/script/check_attendance_script.php');
                            break;
                        case 'view_attendance':
                            include('./pages/attendance/script/view_attendance_script.php');
                            break;
                    }
                } else if ($_SESSION['user-data']['role'] == 2) {
                    switch ($page) {
                        case 'profile':
                            include('./pages/user/script/profile_script.php');
                            break;
                        case 'account_details_edit':
                            include('./pages/user/script/account_details_edit_script.php');
                            break;
                    }
                }
            }
            
        ?>
    </body>
    </html>