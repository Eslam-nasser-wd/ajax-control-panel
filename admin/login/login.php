<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>

	<label>Username: </label>
	<br>
	<input type="text" placeholder="Username" id="username">
	<br><br>
	<label>Password: </label>
	<br>
	<input type="password" placeholder="Password" id="password">

	<button id="loginButton">Login</button>


<script src="./assets/js/jquery.min.js"></script>
<script>

	var username, password,
		tempUrl = window.location.href + '';


		
	$.ajax({
		type: 'GET',
		url: 'http://localhost/rest/api/api.php/users?transform=1',
		success: function(items){
			$.each(items, function(i, item) {
				$.each(item, function(i, item) {
					username = item.username;
					password = item.password;
				});
			});
		},
		error: function(){
			console.log('ERROR!!!')
		}
	})

	$('#loginButton').on('click', function(event) {
		var inputUsername = $('#username').val(),
			inputPassword = $('#password').val(),
			localUrl = window.location.href;

		event.preventDefault();

		if (inputUsername == username && inputPassword == password) {
			window.location = localUrl + 'dashboard.php';
		}else{
			console.log('ERROR!')
		}
	});

</script>
	
</body>
</html>