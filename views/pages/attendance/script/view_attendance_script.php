<!-- this file is the total manipulation of view attendance page -->

<script>
    $(function() { //if document is ready
        var dataTableReady = false;
        view_attendance($('#filter_date').val())

        $('#filter_date').change(function(){
            if('<?= $is_print ?>') 
            {
                if(dataTableReady)
                {
                    $('#tbl_download_attendance').DataTable().destroy()
                }
                $('#tbl_download_attendance tbody').empty()
            }
            else
            {
                if(dataTableReady)
                {
                    $('#tbl_view_attendance').DataTable().destroy()
                }
                $('#tbl_view_attendance tbody').empty()
            }
            

            view_attendance($(this).val())
        }) //filter date change function end

        function view_attendance(filter_date)
        {
            
            $.ajax({ //this ajax will read all employees inside the database
                url: '/personnel-management-system/controller/attendance/read.php',
                type: 'get',
                data: {
                    'filter_date' : filter_date
                },
                success: function(response)
                {
                    console.log(response)
                    response = JSON.parse(response)
                    if(response.status == 'true' || response.status == true) 
                    {
                        var ctr=1
                        for(var x=0; x < response.details.length; x++) 
                        {
                            var row = response.details[x];
                            row.mark = row.mark == 1 ? 'Present' : 'Absent';
                            if('<?= $is_print ?>') 
                            {
                                //if page is download page - download table will be populated
                                var output = '<tr><td class="align-middle">'+row.fullname+'</td><td class="align-middle">'+row.date+'</td><td class="align-middle">'+row.time+'</td><td class="align-middle">'+row.mark+'</td></tr>';
                                $('#tbl_download_attendance tbody').append(output);
                            } 
                            else 
                            {
                                //if page is normal page - normal table will be populated
                                var output = '<tr><td class="align-middle">'+row.fullname+'</td><td class="align-middle">'+row.date+'</td><td class="align-middle">'+row.time+'</td><td class="align-middle">'+row.mark+'</td><td class="d-flex text-center"><a href="?page=employee_view&id='+row.id+'" class="btn btn-link"><i class="fa fa-folder"></i></a><a href="?page=employee_edit&id='+row.id+'" class="btn btn-link text-success"><i class="fa fa-edit"></i></a><a href="/personnel-management-system/controller/employee/destroy.php?id='+row.id+'" class="btn btn-link text-danger"><i class="fa fa-trash"></i></a></td></tr>';
                                $('#tbl_view_attendance tbody').append(output);
                            }
                            
                            ctr++;
                        }
                    }
                    else 
                    {
                        if('<?= $is_print ?>') 
                        {
                            //if no datas found in database - print page
                            $('#tbl_download_attendance tbody').append('<tr><td colspan="4" class="text-center text-muted text-italicize">No datas found.</td></tr>');
                        }
                        else 
                        {
                            //if no datas found in database - normal page
                            $('#tbl_view_attendance tbody').append('<tr><td colspan="5" class="text-center text-muted text-italicize">No datas found.</td></tr>');
                        }
                        dataTableReady = false;
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
                        $("#tbl_download_attendance").DataTable({
                                    "responsive": true, "lengthChange": false, "autoWidth": false,"searching": false,"info": false,"paging": false,
                                    "buttons": ["copy", "csv", "excel", "pdf", "print"]
                                    }).buttons().container().appendTo('#tbl_download_attendance_wrapper .col-md-6:eq(0)');
                        $(".buttons-pdf").addClass("btn-danger")
                        $(".buttons-csv").addClass("btn-warning")
                        $(".buttons-excel").addClass("btn-success")
                        $(".buttons-print").addClass("btn-info")
                        dataTableReady = true;
                    } else 
                    {
                        //apply datatable - normal page
                        $('#tbl_view_attendance').DataTable({
                            "paging": true,
                            "lengthChange": true,
                            "searching": true,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                            "responsive": true,
                        });
                        dataTableReady = true;
                    }
                }
            }
        }) //ajax end
        }

    });
</script>