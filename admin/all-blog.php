<?php $page_title = "All Blogs" ?>
<?php include './assets/header.php' ?>
<?php include './assets/parts/sidebar.php' ?>

<section id="rightSide">
	<div class="all-blogs">
		<table>
			<thead>
				<tr>
					<th>Title</th>
					<th>Writer</th>
					<th>ID</th>
					<th>Category</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</section>

<script src="./assets/js/jquery.min.js"></script>
<script>
	$.ajax({
		type: 'GET',
		url: 'http://localhost/rest/api/api.php/posts?transform=1',
		success: function(items){
			$.each( items , function(i, item){
				$('tbody').append(`
					<tr>
						<td>`+item.title+`</td>
						<td>Eslam</td>
						<td>`+item.id+`</td>
						<td>Web Design</td>
						<td><button class="remove"><i class="icon ion-trash-a"></i></button></td>
						<td><button class="edit"><i class="icon ion-edit"></i></button></td>
					</tr>
				`)
			});
		},
		error: function(){
			alert('Error to make a connection with the database!')
		}
	});
</script>
<?php include './assets/footer.php' ?>