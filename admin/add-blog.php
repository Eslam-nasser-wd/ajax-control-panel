<?php $page_title = "Add Blog Post" ?>
<?php include './assets/header.php' ?>
<?php include './assets/parts/sidebar.php' ?>

<section id="rightSide">
	<div class="add-blog cf">
		<form action="">
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
						<option value="design">Web Design</option>
						<option value="develop">Web Developemnt</option>
					</select>
				</div>
			</div>
			<div id="submitButton">Submit!</div>
		</form>
	</div>
</section>


<script src="assets/js/jquery.min.js"></script>
<script>
	$('#submitButton').click(function() {
		var inputTitle = $('#contentTitle').val(),
			inputDescription = $('#contentDescription').val(),
			inputWriter = $('#writer').val(),
			inputCategory = $('#category').val();

		var object = {
			title: inputTitle,
			description: inputDescription,
			writer: inputWriter,
			cateogry_name: inputCategory,
			user_id: 1,
			category_id: 1
		}
		console.log(object)
		$.ajax({
			type: 'POST',
			url: 'http://localhost/rest/api/api.php/posts',
			data: object,
			success: function(newItem){
				console.log('DONE!')
				console.log(newItem)
			},
			error: function(){
				console.log('ERROR!')
			}
		})
	});
</script>
<?php include './assets/footer.php' ?>