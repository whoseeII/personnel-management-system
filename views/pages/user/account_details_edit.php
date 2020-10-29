<div class="row justify-content-center">
    <div class="col-md-5 col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Account Details Form</h3>
            </div>
            
            <form action="/personnel-management-system/controller/user/account_update.php" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= $_SESSION['user-data']['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="re_password">Re-enter Password</label>
                        <input type="password" class="form-control" id="re_password" placeholder="Re-enter Password">
                    </div>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary btn-submit" disabled>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>