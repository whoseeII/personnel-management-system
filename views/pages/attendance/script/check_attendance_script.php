<!-- this file is the total manipulation of add new employee page -->

<script>
    // function selectName(data) {
    //     
    // }
    $(function() { //if document ready
        $('.select2').select2()

        $.ajax({ //this ajax will read all employees inside the database
            url: '/personnel-management-system/controller/employee/read.php',
            success: function(response)
            {
                response = JSON.parse(response)
                if(response.status) 
                {
                    for(var x=0; x < response.details.length; x++) 
                    {
                        var row = response.details[x];
                        var output = '<option value="'+row.id+'">'+row.fullname+'</option>';
                        $('#employee_select').append(output);
                    }
                }
                else 
                {
                    $('#employee_select').append('<option>No employees encoded.</option>');
                }
               
           },
           complete: function(response)
           {
            response = JSON.parse(response.responseText)
            if(response.status) //if their is/are datas retrieved from the database
            {
                
            }
          }
       }) //ajax end


       $('#employee_select').change(function() {
            if($(this).val() != '-') {
                $('.btn-present').prop('disabled', false)
                $('.btn-absent').prop('disabled', false)
            } else {
                $('.btn-present').prop('disabled', true)
                $('.btn-absent').prop('disabled', true)
            }
        })

        $('.btn-present').click(function(){
            $.ajax({ //this ajax will read all employees inside the database
                    url: '/personnel-management-system/controller/attendance/check_attendance.php',
                    type: 'post',
                    data: {
                        'employee_id' : $('#employee_select').val(),
                        'mark': 1,
                        'date': $('#date').val()
                    },
                    complete: function(response)
                    {
                        response = JSON.parse(response.responseText)
                        toastr.success(response.message);
                        $('.btn-present').prop('disabled', true)
                        $('.btn-absent').prop('disabled', true)
                    }
            })
        })

        $('.btn-absent').click(function(){
            $.ajax({ //this ajax will read all employees inside the database
                    url: '/personnel-management-system/controller/attendance/check_attendance.php',
                    type: 'post',
                    data: {
                        'employee_id' : $('#employee_select').val(),
                        'mark': false,
                        'date': $('#date').val()
                    },
                    complete: function(response)
                    {
                        response = JSON.parse(response.responseText)
                        toastr.success(response.message);
                        $('.btn-present').prop('disabled', true)
                        $('.btn-absent').prop('disabled', true)
                    }
            })
        })
    });
</script>