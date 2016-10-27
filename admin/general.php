<?php $page_title = "Edit your account" ?>
<?php include './assets/header.php' ?>
<?php include './assets/parts/sidebar.php' ?>

<section id="rightSide">
	<div class="add-blog cf">
		<form>
			<div class="input-warpper">
				<label>Username</label>
				<input type="color" id="siteColor" style="width: 40px; height: 40px; padding: 3px">
			</div>
			<div class="input-warpper cf">
				<div class="half">
					<a class="files-btn">Add Image</a>
					<input type="file" accept="image/*" id="imagesInput">
					<div class="image-preview-warpper" style="display: block">
						<i class="icon ion-close"></i>
						<img src="" alt="">
					</div>
				</div>
			</div>
			<div id="submitButton">Save!</div>
		</form>
	</div>
</section>

<script src="assets/js/jquery.min.js"></script>
<script src="uploader/resize.js"></script>
<script src="uploader/app.js"></script>
<script>


	$.ajax({
		type: 'GET',
		url: 'http://localhost/rest/api/api.php/general/1',
		success: function(option){
			$('#siteColor').val(option.text_colors);
			// $('#imagesInput').val(option.section_image)
			$('.image-preview-warpper img').attr('src', option.section_image)
		},
		error: function(){
			console.log('ERROR!')
		}
	});


	$('#submitButton').click(function() {
		var inputColor = $('#siteColor').val(),
			inputImageUrl    = self.location.origin + finalUrl;

		var object = {
			text_colors: inputColor,
			section_image: inputImageUrl
		}
		$.ajax({
			type: 'PUT',
			url: 'http://localhost/rest/api/api.php/general/1',
			data: object,
			success: function(newItem){
				console.log('DONE!')
				console.log(newItem)
			},
			error: function(){
				console.log('ERROR!')
			}
		});
	});
</script>
<?php include './assets/footer.php' ?>