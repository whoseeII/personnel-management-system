<div class="container" style="margin-top:30px">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>Nards Inventory System - Register</strong></h3></div>
            <div class="panel-body">
                <form role="form" method="post" action="../controller/user/register.php">
                    <div class="form-group">
                        <label for="txt_username">Fullname</label>
                        <input type="text" class="form-control" style="border-radius:0px" name="fullname" placeholder="Enter Fullname">
                    </div>
                    <div class="form-group">
                        <label for="txt_username">Username</label>
                        <input type="text" class="form-control" style="border-radius:0px" name="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="txt_password">Password</label>
                        <input type="password" class="form-control" style="border-radius:0px" name="password" placeholder="Enter Password">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" name="btn_register">Submit</button>
                    <a class="btn btn-success btn-sm" href="?page=login">Proceed to Login</a>
                </form>
                <?php
                    if ( isset($_GET['register']) ) {
                        ?>
                            <br>
                            <span class="<?= $_GET['register']==1 ? 'success-message' : 'error-message' ?>" >
                                <i>
                                    <?= $_SESSION['register-message'] ? $_SESSION['register-message'] : 'Please fill up all fields!' ?>
                                </i>
                            </span>
                        <?php
                        $_SESSION['register-status'] = '';
                        $_SESSION['register-message'] = '';
                    }
                ?>
            </div>
        </div>
    </div>
</div>