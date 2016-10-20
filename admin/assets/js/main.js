// Our custom js
$(document).ready(function(){
	
    // Kill links
    $('a[href="#"]').on('click', function(event) {
        event.preventDefault();
    });

    // File uploader
    $('.files-btn').click(function() {
    	$('#imagesInput').trigger('click')
    });

    // Show image preview
    function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    reader.onload = function (e) {
	      $('.image-preview-warpper').css('display', 'block');
	      $('.image-preview-warpper img').attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}
	$("#imagesInput").change(function(){
	  readURL(this);
	});

});