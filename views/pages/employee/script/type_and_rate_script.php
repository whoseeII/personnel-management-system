<!-- this file is the total manipulation of Type and Rate page -->

<script>
    $(function() {
        if("<?= $_SESSION['transaction-status'] ?>" == 'true') {
            toastr.success("<?= $_SESSION['transaction-message'] ?>");
        } else if("<?= $_SESSION['transaction-status'] ?>" == 'false') {
            toastr.error("<?= $_SESSION['transaction-message'] ?>");
        }
        <?php
            $_SESSION['transaction-status'] = '';
            $_SESSION['transaction-message'] = '';
        ?>
            
        $.ajax({
            url: '/personnel-management-system/controller/type_and_rate/read.php',
            success: function(response)
            {
                response = JSON.parse(response)
                for(var x=0; x < response.details.length; x++) {
                    var row = response.details[x];
                    var output = '<tr><td>'+row.type+'</td><td>'+row.rate+'</td><td class="text-center"><div class=""><form method="post" action="/personnel-management-system/controller/type_and_rate/destroy.php"><input type="hidden" name="id" value="'+row.id+'"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></form></div></td></tr>';
                    $('#tbl_type_and_rate tbody').append(output);
                }
               
           },
           complete: function()
           {
            $('#tbl_type_and_rate').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false
            });
           }
       })
    });
</script>