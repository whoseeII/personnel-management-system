<div class="row">
    <div class="col-12">
    
      <div class="card">
        <div class="card-header d-flex">
          <h3 class="card-title flex-fill">List of Attendance</h3>
          <input type="date" name="filter_date" id="filter_date" class="form-control form-control-sm col-2 mr-2">
          <script>
                document.getElementById('filter_date').valueAsDate = new Date();
          </script>
          <a href="?page=view_attendance&print=1" class="btn btn-danger btn-sm float-right">
            <i class="fa fa-download"></i>
            Download Attendance
          </a>
        </div>
        <div class="card-body">
          <table id="tbl_view_attendance" class="table">
            <thead>
              <tr>
                <th style="width:40%">Name</th>
                <th style="width:15%">Date</th>
                <th style="width:15%">Time</th>
                <th style="width:20%">Mark</th>
                <th style="width:10%" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>