<nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
    <div class="container">
      <a href="?page=home" class="navbar-brand">
        <span class="brand-text font-weight-light">Personnel Mngmnt</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3 ml-2" style="border-left:2px solid white; padding-left:5px" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="?page=home" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="?page=profile" class="nav-link">Profile</a>
          </li>
          
        </ul>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-cogs"></i></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow  bg-info">
              <li>
                <a href="?page=profile" class="dropdown-item">
                  <i class="fa fa-user"></i> Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/personnel-management-system/controller/user/logout.php">
                  <i class="fas fa-power-off"></i> Logout
                </a>
              </li>
            </ul>
          </li>
      </ul>
    </div>
  </nav>