<div class="row employee-details">
    <div class="col-12">
        <div class="card card-info  h-100">
            <div class="card-header">
                <a href="?page=all_employees">
                    <h3 class="card-title btn-back"><i class="fa fa-arrow-left"></i> Back</h3>
                    <h3 class="card-title print-title d-none"></i>PERSONNEL MANAGEMENT</h3>
                </a>
            </div>
            <div class="card-body" id="print-details">
                <div class="row my-5">
                    <div class="col-md-4 col-2"></div>
                    <div class="col-md-4 col-8 text-center employee-photo"></div>
                    <div class="col-md-4 col-2"></div>
                </div>
                <div class="row my-2">
                    <div class="form-group col-sm-6 col-12">
                        <label for="fullname" class="col-sm-9 control-label">Employee Name</label>
                        <input type="text" class="form-control input-view text-capitalize" name="fullname" id="fullname" disabled>
                    </div>
                    <div class="form-group col-sm-3 col-12">
                        <label for="type" class="col-sm-9 control-label">Position/Role</label>
                        <input type="text" class="form-control input-view text-capitalize" name="type" id="type" disabled>
                    
                    </div>
                    <div class="form-group col-sm-3 col-12">
                        <label for="rate" class="col-sm-9 control-label">Daily Rate</label>
                        <input type="text" class="form-control input-view text-capitalize" name="rate" id="rate" disabled>
                    </div>
                </div>
                
                <div class="row my-2">
                    <div class="form-group col-sm-6 col-12">
                        <label for="address" class="col-sm-9 control-label">Address</label>
                        <input type="text" class="form-control input-view text-capitalize" name="address" id="address" disabled>
                    </div>
                    <div class="form-group col-sm-3 col-12">
                        <label for="gender" class="col-sm-9 control-label">Gender</label>
                        <input type="text" class="form-control input-view text-capitalize" name="gender" id="gender" disabled>
                    </div>
                    <div class="form-group col-sm-3 col-12">
                        <label for="marital" class="col-sm-9 control-label">Marital</label>
                        <input type="text" class="form-control input-view text-capitalize" name="marital" id="marital" disabled>
                    </div>
                </div>

                <div class="row my-2">
                    <div class="form-group col-sm-4 col-12">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <input type="text" class="form-control input-view text-capitalize" name="email" id="email" disabled>
                    </div>
                    <div class="form-group col-sm-4 col-12">
                        <label for="mobile" class="col-sm-4 control-label">Mobile</label>
                        <input type="text" class="form-control input-view text-capitalize" name="mobile" id="mobile" disabled>
                    </div>
                    <div class="form-group col-sm-4 col-12">
                        <label for="join_date" class="col-sm-4 control-label">Join Date</label>
                        <input type="text" class="form-control input-view text-capitalize" name="join_date" id="join_date" disabled>
                    </div>
                </div>

                

            </div>
            <div class="card-footer text-center">
                <a href="?page=employee_edit&id=<?= $_GET['id'] ?>" class="btn btn-success btn-edit">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <button class="btn btn-danger btn-print">
                    <i class="fa fa-print"></i> Print
                </button>
            </div>
        </div>
</div>