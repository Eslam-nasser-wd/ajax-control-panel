<?php $page_title = "Edit your account" ?>
<?php include './assets/header.php' ?>
<?php include './assets/parts/sidebar.php' ?>

<section id="rightSide">
	<div class="add-blog cf">
		<form>
			<div class="input-warpper">
				<label>Username</label>
				<input type="text" placeholder="Username" id="editUsername">
			</div>
			<div class="input-warpper">
				<label>Password</label>
				<input type="text" placeholder="Password" id="editPassword">
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
		url: 'http://localhost/rest/api/api.php/users/1',
		success: function(user){
			$('#editUsername').val(user.username)
			$('#editPassword').val(user.password)
		},
		error: function(){
			console.log('ERROR!')
		}
	});


	$('#submitButton').click(function() {
		var inputUsername = $('#editUsername').val(),
			inputPassword = $('#editPassword').val();
		var object = {
			username: inputUsername,
			password: inputPassword,
		}
		$.ajax({
			type: 'PUT',
			url: 'http://localhost/rest/api/api.php/users/1',
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