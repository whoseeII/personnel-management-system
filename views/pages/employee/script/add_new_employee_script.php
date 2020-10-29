<!-- this file is the total manipulation of add new employee page -->

<script>
    $(function() { //if document ready
        
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

        $('#type').change(function(){ //when Select tag changed, the value of the Rate input in the form
                                      //will change according on its Type
            var rate = $(this).find(':selected').data('rate')
            $('#rate').val(rate)
            rate ? $('#rate').focus() : null
        });
    });
</script>