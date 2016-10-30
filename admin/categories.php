<?php $page_title = "Edit your account" ?>
<?php include './assets/header.php' ?>
<?php include './assets/parts/sidebar.php' ?>

<section id="rightSide">
	<div class="add-blog cf">
		<form>
			<div class="input-warpper">
				<label>Category Name:</label>
				<input type="text" placeholder="Category Name" id="categoryName">
			</div>
			<div id="submitButton">Save!</div>
		</form>
	</div>
	
	<br><br><br>

	<div class="all-blogs">
		<table>
			<thead>
				<tr>
					<th>Category Name</th>
					<th>Category Id</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>

</section>

<script src="assets/js/jquery.min.js"></script>
<script>


	$.ajax({
		type: 'GET',
		url: 'http://localhost/rest/api/api.php/categories?transform=1',
		success: function(items){
			$.each(items, function(i, item) {
				$.each(item, function(i, item) {
					$('tbody').append(`
						<tr>
							<td>`+item.name+`</td>
							<td>`+item.id+`</td>
							<td><button data-id="`+item.id+`" class="remove"><i class="icon ion-trash-a"></i></button></td>
						</tr>
					`)
				});
			});
		},
		error: function(){
			console.log('ERROR!!!')
		}
	});



	$('tbody').delegate('.remove', 'click', function(){
		var this_id 	= $(this).attr('data-id'),
		    tr 			= $(this).closest('tr');
		console.log(this_id, tr)
		$.ajax({
			type: 'DELETE',
			url: 'http://localhost/rest/api/api.php/categories/'+this_id,
			success: function() {
				tr.remove();
			},
			error: function(){
				console.log('NOT REMOVED!!!!')
			}
		});
	});


	$('#submitButton').click(function() {
		var inputCategoryName = $('#categoryName').val();
		var object = {
			name: inputCategoryName
		}
		$.ajax({
			type: 'POST',
			url: 'http://localhost/rest/api/api.php/categories',
			data: object,
			success: function(newItem){
				console.log('DONE!')
				// console.log(object)
				console.log(newItem)
				
				$('tbody').append(`
					<tr>
						<td>`+object.name+`</td>
						<td>`+newItem+`</td>
						<td><button data-id="`+newItem+`" class="remove"><i class="icon ion-trash-a"></i></button></td>
					</tr>
				`)
			},
			error: function(){
				console.log('ERROR!')
			}
		});
	});
</script>
<?php include './assets/footer.php' ?>