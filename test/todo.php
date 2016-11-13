<?php include 'assets/header.php' ?>


<div class="form">
	<label>user id:</label>
	<select id="userId">
		<option value="1">Ahmed</option>
		<option value="2">Eslam</option>
		<option value="3">Sami</option>
	</select>
	
	<br>
	<label>Title</label>
	<input type="text" id="taskTitle">

	<br>
	<label>completed:</label>
	<select id="completed">
		<option value="true">Yes</option>
		<option value="false">No</option>
	</select>

	<button id="saveTask">Save!</button>

</div>


<div class="cards-warpper">
	
	

</div><!--/cards-warpper-->


<script>

	$('#saveTask').click(function(){
		var taskTitle = $('#taskTitle').val()
		var userId    = parseInt($('#userId').val())
		var completed = $('#completed').val()

		if(completed == 'true'){
			completed = true
		}else{
			completed = false
		}

		var json = {
			userId: userId,
			title: taskTitle,
			completed: completed
		}

		$.ajax({
			type: 'POST',
			url: 'https://jsonplaceholder.typicode.com/todos',
			data: json,
			success: function(item){
				console.log('Data Sent!')
				$('.cards-warpper').append(`
						<div class="card">
							<div class="status `+status+`"></div>
							<h2 class="taskTitle">`+item.title+`</h2>
							<h5 class="user">`+username+`</h5>
						</div>
					`);
			},
			error: function(){
				console.log('Error!')
			}
		})


	})














	$.ajax({
		type: 'GET',
		url: 'https://jsonplaceholder.typicode.com/todos',
		success: function(items){
			console.log('Done !')
			$.each(items, function(i, item){
				var username, status;

				if (item.userId == 1) {
					username = 'Ahmed';
				}
				if(item.completed == true){
					status = 'done'
				}else if(item.completed == false){
					status = 'not-done'
				}else{
					status = 'unknown'
				}

				$('.cards-warpper').append(`
						<div class="card">
							<div class="status `+status+`"></div>
							<h2 class="taskTitle">`+item.title+`</h2>
							<h5 class="user">`+username+`</h5>
						</div>
					`);
			})
		},
		error: function(){
			console.log('Error !')
		}
	})
</script>
<?php include 'assets/footer.php' ?>