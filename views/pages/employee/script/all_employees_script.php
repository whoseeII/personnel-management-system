<!-- this file is the total manipulation of all employees page -->

<script>
    $(function() { //if document is ready
        if("<?= $_SESSION['transaction-status'] ?>" == 'true') 
        {
            // if transaction exist and value is true - pop up message will appear 
            // on the upper right of the page with transaction message
            toastr.success("<?= $_SESSION['transaction-message'] ?>");
            console.log("<?= $_SESSION['transaction-message'] ?>")
        } 
        else if("<?= $_SESSION['transaction-status'] ?>" == 'false') 
        {
            // if transaction exist and value is false - pop up message will appear 
            // on the upper right of the page with transaction message
            toastr.error("<?= $_SESSION['transaction-message'] ?>");
        }
        <?php
            // unset the ff sessions
            $_SESSION['transaction-status'] = ''; 
            $_SESSION['transaction-message'] = '';
        ?>

        $.ajax({ //this ajax will read all employees inside the database
            url: '/personnel-management-system/controller/employee/read.php',
            success: function(response)
            {
                response = JSON.parse(response)
                if(response.status) 
                {
                    var ctr=1
                    for(var x=0; x < response.details.length; x++) 
                    {
                        var row = response.details[x];
                        if('<?= $is_print ?>') 
                        {
                            //if page is download page - download table will be populated
                            var output = '<tr><td><b>'+ctr+'.</b>'+row.fullname+'</td><td>'+row.type+'</td><td>'+row.rate+'</td><td>'+row.address+'</td><td>'+row.join_date+'</td><td>'+row.mobile+'</td></tr>';
                            $('#tbl_download_all_employees tbody').append(output);
                        } 
                        else 
                        {
                            //if page is normal page - normal table will be populated
                            var output = '<tr><td><img class="img-circle img-bordered-sm w-75" src="'+row.photo+'" alt="'+row.fullname+'" /></td><td class="align-middle">'+row.fullname+'</td><td class="align-middle">'+row.type+'</td><td class="align-middle">'+row.address+'</td><td class="d-flex text-center"><a href="?page=employee_view&id='+row.id+'" class="btn btn-link"><i class="fa fa-folder"></i></a><a href="?page=employee_edit&id='+row.id+'" class="btn btn-link text-success"><i class="fa fa-edit"></i></a><a href="/personnel-management-system/controller/employee/destroy.php?id='+row.id+'" class="btn btn-link text-danger"><i class="fa fa-trash"></i></a></td></tr>';
                            $('#tbl_all_employees tbody').append(output);
                        }
                        
                        ctr++;
                    }
                }
                else 
                {
                    if('<?= $is_print ?>') 
                    {
                        //if no datas found in database - print page
                        $('#tbl_download_all_employees tbody').append('<tr><td colspan="6" class="text-center text-muted text-italicize">No datas found.</td></tr>');
                    }
                    else 
                    {
                        //if no datas found in database - normal page
                        $('#tbl_all_employees tbody').append('<tr><td colspan="5" class="text-center text-muted text-italicize">No datas found.</td></tr>');
                    }
                }
               
           },
           complete: function(response)
           {
            response = JSON.parse(response.responseText)
            if(response.status) //if their is/are datas retrieved from the database
            {
                if('<?= $is_print ?>') 
                {
                    //apply datatable - print page
                    $("#tbl_download_all_employees").DataTable({
                                "responsive": true, "lengthChange": false, "autoWidth": false,
                                "buttons": ["copy", "csv", "excel", "pdf", "print"]
                                }).buttons().container().appendTo('#tbl_download_all_employees_wrapper .col-md-6:eq(0)');
                    $(".buttons-pdf").addClass("btn-danger")
                    $(".buttons-csv").addClass("btn-warning")
                    $(".buttons-excel").addClass("btn-success")
                    $(".buttons-print").addClass("btn-info")
                } else 
                {
                    //apply datatable - normal page
                    $('#tbl_all_employees').DataTable({
                        "paging": true,
                        "lengthChange": true,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                    });
                }
            }
          }
       })
    });
</script>