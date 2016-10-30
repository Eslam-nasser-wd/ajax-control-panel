<?php $page_title = "Add Blog Post" ?>
<?php include './assets/header.php' ?>
<?php include './assets/parts/sidebar.php' ?>

<section id="rightSide">
	<div class="add-blog cf">
		<div class="white-layer">
			<span class="spinner"></span>
		</div>
		<form>
			<div class="input-warpper">
				<label>Title</label>
				<input type="text" placeholder="Title" id="contentTitle">
			</div>
			<div class="input-warpper">
				<label>Content</label>
				<textarea placeholder="Content" rows="5" id="contentDescription"></textarea>
			</div>
			<div class="input-warpper cf">
				<div class="half">
					<label>Writer</label>
					<select id="writer">
						<option value="eslam">Eslam</option>
						<option value="mohamed">Mohamed</option>
					</select>
				</div>
				<div class="half">
					<label>Category</label>
					<select id="category">
						

						<!-- Dynamic options tags -->


					</select>
				</div>
			</div>
			<div class="input-warpper cf">
				<div class="half">
					<input type="date" id="showDate">
				</div>
				<div class="half">
					<a class="files-btn">Add Image</a>
					<input type="file" accept="image/*" id="imagesInput">
					<div class="image-preview-warpper">
						<i class="icon ion-close"></i>
						<img src="" alt="">
					</div>
				</div>
			</div>
			<div id="submitButton">Submit!</div>
		</form>
	</div>
</section>

<div id="sent" class="noti">
	<i class="icon ion-android-done-all"></i>
	Post Saved
</div>

<div id="notSent" class="noti">
	<i class="icon ion-alert-circled"></i>
	Post NOT Saved
</div>


<script src="assets/js/jquery.min.js"></script>
<script src="uploader/resize.js"></script>
<script src="uploader/app.js"></script>
<script>

	$.ajax({
		type: 'GET',
		url: 'http://localhost/rest/api/api.php/categories?transform=1',
		success: function(items){
			$.each(items, function(i, item) {
				$.each(item, function(i, item) {
					$('select#category').append(`
						<option value="`+item.id+`">`+item.name+`</option>
					`)
				});
			});
		},
		error: function(){
			console.log('ERROR!!!')
		}
	});

	$('#submitButton').click(function(){

		$('.white-layer').fadeIn('fast').css({
			display: 'flex'
		});
		var inputTitle   	 = $('#contentTitle').val(),
			inputDescription = $('#contentDescription').val(),
			inputWriter      = $('#writer').val(),
			inputCategory    = parseInt($('#category').val()),
			inputShowDate    = $('#showDate').val(),
			inputCurrentDate = new Date().getFullYear()+'-'+
							  (new Date().getMonth()+1) +'-'+
							   new Date().getDate(),
			inputImageUrl    = self.location.origin + finalUrl;

		var object = {
			post_title: inputTitle,
			post_description: inputDescription,
			writer: inputWriter,
			cateogry_id: inputCategory,
			image_url: inputImageUrl,
			show_date: inputShowDate,
			post_date: inputCurrentDate
		}

		$.ajax({
			type: 'POST',
			url: 'http://localhost/rest/api/api.php/posts',
			data: object,
			success: function(newItem){
				console.log('DONE!')
				console.log(object)
				$('.white-layer').delay(1000).fadeOut('fast', function(){
					$('#sent').addClass('show');
					setTimeout(function(){
						$('#sent').removeClass('show');	
					}, 2000);
				});
			},
			error: function(){
				console.log('ERROR!');
				$('.white-layer').delay(1000).fadeOut('fast', function(){
					$('#notSent').addClass('show');
					setTimeout(function(){
						$('#notSent').removeClass('show');	
					}, 2000);
				});
			}
		});
	});
</script>
<?php include './assets/footer.php' ?>