<div class="row">
    <div class="col-12">
    
      <div class="card">
        <div class="card-header">
            <input type="date" name="filter_date" id="filter_date" class="form-control form-control-sm col-2 float-right">
            <script>
                    document.getElementById('filter_date').valueAsDate = new Date();
            </script>
        </div>
        <div class="card-body">
          <table id="tbl_download_attendance" class="table">
            <thead>
              <tr>
                <th style="width:50%">Name</th>
                <th style="width:15%">Date</th>
                <th style="width:15%">Time</th>
                <th style="width:20%">Mark</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>