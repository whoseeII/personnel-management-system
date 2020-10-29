<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="/personnel-management-system/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Personnel Mngmnt</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/personnel-management-system/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-capitalize"><?= $_SESSION['user-data']['username'] ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="?page=dashboard" class="nav-link <?= $page === 'dashboard' ? 'active':null ?>">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?= in_array($page, array('add_new_employee', 'type_and_rate', 'all_employees')) ? 'menu-open':null ?>">
            <a href="#" class="nav-link <?= in_array($page, array('add_new_employee', 'type_and_rate', 'all_employees')) ? 'active':null ?>">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                Employees
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">
              <li class="nav-item">
                <a href="?page=all_employees" class="nav-link <?= $page === 'all_employees' ? 'active':null ?>">
                  <i class="fa fa-users"></i>
                  <p>All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=add_new_employee" class="nav-link <?= $page === 'add_new_employee' ? 'active':null ?>">
                  <i class="fa fa-plus"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=type_and_rate" class="nav-link <?= $page === 'type_and_rate' ? 'active':null ?>">
                  <i class="fa fa-percent"></i>
                  <p>Type & Rate</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?= in_array($page, array('check_attendance', 'view_attendance')) ? 'menu-open':null ?>">
            <a href="#" class="nav-link <?= in_array($page, array('check_attendance', 'view_attendance')) ? 'active':null ?>">
              <i class="nav-icon fa fa-clipboard"></i>
              <p>
                Attendance
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">
              <li class="nav-item">
                <a href="?page=check_attendance" class="nav-link <?= $page === 'check_attendance' ? 'active':null ?>">
                  <i class="fa fa-user-check"></i>
                  <p>Check Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=view_attendance" class="nav-link <?= $page === 'view_attendance' ? 'active':null ?>">
                  <i class="fa fa-file"></i>
                  <p>View Attendance</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="/personnel-management-system/controller/user/logout.php" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </nav>
    </div>
  </aside>