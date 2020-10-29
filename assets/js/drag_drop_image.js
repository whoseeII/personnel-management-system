function readFile(input) {
    if (input.files && input.files[0]) {
        var ext = input.files[0].name.split('.').pop();
        var valid_ext = ['jpg', 'png', 'jpeg'];
        if(valid_ext.includes(ext)) {
            var reader = new FileReader();
  
            reader.onload = function(e) {

                var htmlPreview =
                '<img width="200" src="' + e.target.result + '" />' +
                '<p>' + input.files[0].name + '</p>';
                var wrapperZone = $(input).parent();
                var previewZone = $(input).parent().parent().find('.preview-zone');
                var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');
        
                wrapperZone.removeClass('dragover');
                previewZone.removeClass('hidden');
                boxZone.empty();
                boxZone.append(htmlPreview);
            };
        
            reader.readAsDataURL(input.files[0]);
            $('.remove-preview').removeClass('d-none');
            $('.remove-preview').text('Change picture');
        } else {
            var htmlPreview =
                '<p class="text-danger"><i>' + input.files[0].name + '</i> is invalid file! Please upload image file only.</p>';
                var wrapperZone = $(input).parent();
                var previewZone = $(input).parent().parent().find('.preview-zone');
                var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');
        
                wrapperZone.removeClass('dragover');
                previewZone.removeClass('hidden');
                boxZone.empty();
                boxZone.append(htmlPreview);
                $('.remove-preview').removeClass('d-none');
                $('.remove-preview').text('Remove');
        }
      
    }
  }
  
  function reset(e) {
    e.wrap('<form>').closest('form').get(0).reset();
    e.unwrap();
    $('.remove-preview').addClass('d-none');
  }
  
  $(".dropzone").change(function() {
    readFile(this);
    
  });
  
  $('.dropzone-wrapper').on('dragover', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass('dragover');
  });
  
  $('.dropzone-wrapper').on('dragleave', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass('dragover');
  });
  
  $('.remove-preview').on('click', function() {
    var boxZone = $(this).parents('.preview-zone').find('.box-body');
    var previewZone = $(this).parents('.preview-zone');
    var dropzone = $(this).parents('.form-group').find('.dropzone');
    boxZone.empty();
    previewZone.addClass('hidden');
    reset(dropzone);
  });
  