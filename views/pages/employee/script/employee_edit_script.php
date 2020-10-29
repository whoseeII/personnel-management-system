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

        $('#type').change(function(){ //when Select tag changed, the value of the Rate input in the form
                                      //will change according on its Type
            var rate = $(this).find(':selected').data('rate')
            $('#rate').val(rate)
            rate ? $('#rate').focus() : null
        });

        $.ajax({ //this ajax will get all Employee Type and Rate and will display on the Select tag found in the form
            url: '/personnel-management-system/controller/type_and_rate/read.php',
            success: function(response)
            {
                response = JSON.parse(response)
                for(var x=0; x < response.details.length; x++) {
                    var row = response.details[x];
                    var output = '<option value="'+row.type+'" data-rate="'+row.rate+'">'+row.type+'</option>';
                    $('#type').append(output);
                }
                
            }
        })

        var id = "<?= $_GET['id'] ?>";
        $.ajax({ //this ajax will read all employees inside the database
            url: '/personnel-management-system/controller/employee/employee_view.php',
            type: 'GET',
            data: {id:id},
            success: function(response)
            {
                console.log(response)
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
                    $('#type option[value="'+row.type+'"]').attr('selected','selected');
                    $('#gender option[value="'+row.gender+'"]').attr('selected','selected');
                    $('#marital option[value="'+row.marital+'"]').attr('selected','selected');
                    $('.img-prev').append('<img class="w-25" width="200" src="'+row.photo+'"><br><button type="button" class="btn btn-default btn-sm mt-2 btn-replace">Replace</button>')
                    $('.btn-replace').click(function(event){
                        event.preventDefault()
                        $('#img-prev').empty()
                        $('#photo-div').removeClass('d-none')
                    })
                   
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