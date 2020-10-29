<div class="row">
    <div class="col-12">
        <div class="card card-info  h-100">
            <div class="card-header">
                <h3 class="card-title">Fill up Form</h3>
            </div>
            <form class="form-horizontal" action="/personnel-management-system/controller/employee/store.php" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6 col-12">
                        <label for="fullname" class="col-sm-9 control-label">* Employee Name</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Employee Name">
                    </div>
                    <div class="form-group col-sm-3 col-12">
                        <label for="type" class="col-sm-9 control-label">* Position/Role</label>
                        <select class="form-control text-capitalize" name="type" id="type">
                            <option value="">--</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3 col-12">
                        <label for="rate" class="col-sm-9 control-label">* Daily Rate</label>
                        <input type="text" class="form-control" name="rate" id="rate" placeholder="0.00">
                    </div>
                </div>
                
                <div class="row">
                <div class="form-group col-sm-6 col-12">
                    <label for="address" class="col-sm-9 control-label">* Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address">
                </div>
                <div class="form-group col-sm-3 col-12">
                    <label for="gender" class="col-sm-9 control-label">* Gender</label>
                    <select class="form-control" name="gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-12">
                    <label for="marital" class="col-sm-9 control-label">* Marital</label>
                    <select class="form-control" name="marital">
                        <option>Single</option>
                        <option>Married</option>
                        <option>Widowed</option>
                        <option>Separated</option>
                        <option>Divorced</option>
                    </select>
                </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-4 col-12">
                        <label for="email" class="col-sm-4 control-label">* Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-sm-4 col-12">
                        <label for="mobile" class="col-sm-4 control-label">* Mobile</label>
                        <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                    </div>
                    <div class="form-group col-sm-4 col-12">
                        <label for="join_date" class="col-sm-4 control-label">* Join Date</label>
                        <input type="date" class="form-control" name="join_date" placeholder="Join Date">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <!-- <label class="control-label">Employee Picture</label> -->
                            <div class="preview-zone hidden">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <div><b>Employee Picture</b></div>
                                            <div class="box-tools">
                                                <button type="button" class="btn btn-default btn-sm remove-preview d-none">
                                                    <!-- <i class="fa fa-times"></i> --> Change picture
                                                </button>
                                            </div>
                                        </div>
                                    <div class="box-body"></div>
                                </div>
                            </div>
                            <div class="dropzone-wrapper">
                                <div class="dropzone-desc">
                                    <i class="glyphicon glyphicon-download-alt"></i>
                                    <p>Choose an image file or drag it here.</p>
                                </div>
                                <input type="file" name="photo" class="dropzone">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="submit" class="btn btn-default">Cancel</button>
            </div>
            </form>
        </div>
</div>