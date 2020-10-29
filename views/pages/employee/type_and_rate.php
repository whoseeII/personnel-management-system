<div class="row">
    <div class="col-md-7 col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Available Type & Rate</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tbl_type_and_rate" class="table">
                <thead>
                    <tr>
                    <th>Type</th>
                    <th>Rate per Hour</th>
                    <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                
                </table>
            </div>
        <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-5 col-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Type & Rate Form</h3>
            </div>
            <form class="form-horizontal" action="/personnel-management-system/controller/type_and_rate/store.php" method="post">
                <div class="card-body">
                
                    <div class="form-group">
                        <label for="type" class="control-label">Type</label>
                        <input type="text" class="form-control form-control-lg" name="type" placeholder="Type">
                    </div>
                    <div class="form-group">
                        <label for="rate" class="control-label">Rate per Hour</label>
                        <input type="text" class="form-control form-control-lg" name="rate" placeholder="0.00">
                    </div>
                    <button type="submit" class="btn btn-info btn-block btn-lg">Add</button>

                </div>
            </form>
        </div>
    </div>
</div>
