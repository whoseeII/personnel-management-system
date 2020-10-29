<script>

$(function() {

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
    $.ajax({ //this ajax will get User details
        url: '/personnel-management-system/controller/user/profile.php',
        success: function(response)
        {
            console.log(response)
            response = JSON.parse(response)
            var row = response.details[0];
            console.log(row)
            $('#fullname').text(row['fullname'])
            $('#type').text(row['type'])
            $('#rate').text(row['rate'])
            $('#gender').text(row['gender'])
            $('#marital').text(row['marital'])
            $('#mobile').text(row['mobile'])
            $('#join_date').text(row['join_date'])
            $('#email').text(row['email'])
            $('#address').text(row['address'])
            $('#photo').attr('src', row['photo'])
        }
    })

});
</script>