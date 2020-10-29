<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Attendance Form</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-5 col-12">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Date</label>
                                    <input type="date" class="form-control" name="date" id="date">
                                    <script>
                                        document.getElementById('date').valueAsDate = new Date();
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="employee_select">Employee Name</label>
                                    <select class="form-control select2 " style="width: 100%;" id="employee_select">
                                        <option>-</option>
                                    </select>
                                </div>

                                <div class="form-group mt-5 text-center">
                                    <button class="btn btn-success btn-present" disabled>PRESENT</button>
                                    <button class="btn btn-danger btn-absent" disabled>ABSENT</button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>