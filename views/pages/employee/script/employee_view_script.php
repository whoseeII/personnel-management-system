<!-- this file is the total manipulation of employee view page -->

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
        
        $('.btn-print').click(function(event){
            event.preventDefault()
            $('.card-footer').addClass('d-none')
            $('.btn-back').addClass('d-none')
            $('.print-title').removeClass('d-none')
            window.print()
            $('.card-footer').removeClass('d-none')
            $('.btn-back').removeClass('d-none')
            $('.print-title').addClass('d-none')
        })
        

        var id = "<?= $_GET['id'] ?>";
        $.ajax({ //this ajax will read all employees inside the database
            url: '/personnel-management-system/controller/employee/employee_view.php',
            type: 'GET',
            data: {id:id},
            success: function(response)
            {
                response = JSON.parse(response)
                if(response.status) 
                {
                    var row = response.details[0];
                    $("input[name=fullname]").val(row.fullname);
                    $("input[name=address]").val(row.address);
                    $("input[name=email]").val(row.email);
                    $("input[name=mobile]").val(row.mobile);
                    $("input[name=join_date]").val(row.join_date);
                    $("input[name=rate]").val(row.rate);
                    $("input[name=type]").val(row.type);
                    $("input[name=gender]").val(row.gender);
                    $("input[name=marital]").val(row.marital);
                   
                    $('.employee-photo').append('<img class="img-circle img-bordered-sm w-75" width="200" src="'+row.photo+'">')
                }
                else 
                {
                    
                }
               
           },
           complete: function(response)
           {
            response = JSON.parse(response.responseText)
            if(response.status) //if their is/are datas retrieved from the database
            {
                
            }
          }
       })
    });
</script>