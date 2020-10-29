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

       $('#re_password').keyup(function(){
           $(this).addClass('border border-danger');
           if($(this).val() == $('#new_password').val()) {
               $(this).removeClass('border-danger').addClass('border-success')
               $('.btn-submit').prop('disabled', false)
           } else {
                $('.btn-submit').prop('disabled', true)
           }
       })
    });
</script>