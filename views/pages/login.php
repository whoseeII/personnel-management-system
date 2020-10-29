<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html">Personnel Management</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="../controller/user/login.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php
            if ( isset($_GET['login']) && $_GET['login'] === 'error' ) {
                ?>
                    <br>
                    <span class="login-error">
                        <i>Login error. Please check your inputs.</i>
                    </span>
                <?php
            }
        ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

