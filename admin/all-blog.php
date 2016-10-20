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
			$.each(items, function(i, item) {
				$.each(item, function(i, item) {
					$('tbody').append(`
						<tr>
							<td>
								<span>`+item.post_title+`</span>
								<input type="text" id="editTitle" value="`+item.post_title+`"/>
							</td>
							<td>
								<span>`+item.writer+`</span>
								<select id="editWriter" data-writer="`+item.writer+`">
									<option value="Eslam">Eslam</option>
									<option value="Mohamed">Mohamed</option>
								</select>
							</td>
							<td>`+item.id+`</td>
							<td>
								<span>`+item.category+`</span>
								<select id="editCategory" data-category="`+item.category+`">
									<option value="design">Web Design</option>
									<option value="develop">Web Developemnt</option>
								</select>
							</td>
							<td><button data-id="`+item.id+`" class="remove"><i class="icon ion-trash-a"></i></button></td>
							<td><button data-id="`+item.id+`" class="edit"><i class="icon ion-edit"></i></button></td>
						</tr>
					`)
				});
			});
		},
		error: function(){
			console.log('ERROR!!!')
		}
	})



	$('tbody').delegate('.remove', 'click', function(){
		var this_id 	= $(this).attr('data-id'),
		    tr 			= $(this).closest('tr');
		$.ajax({
		  type: 'DELETE',
		  url: 'http://localhost/rest/api/api.php/posts/'+this_id,
		  success: function() {
		    tr.remove();
		  },
		  error: function(){
		  	console.log('NOT REMOVED!!!!')
		  }
		});
	});



	$('tbody').delegate('.edit', 'click', function(){
		var this_id 	= $(this).attr('data-id'),
		    tr 			= $(this).closest('tr'),
		    this_writer = tr.find('#editWriter').attr('data-writer'),
		    this_category = tr.find('#editCategory').attr('data-category');

		tr.find('#editWriter option').each(function(i, option){
			if( option.getAttribute('value').toUpperCase() == this_writer.toUpperCase()){
				option.setAttribute('selected', 'true');
			}
		});
		tr.find('#editCategory option').each(function(i1, option){
			if( option.getAttribute('value').toUpperCase() == this_category.toUpperCase()){
				option.setAttribute('selected', 'true');
			}
		});
		tr.find('span').hide();
		tr.find('input, select').show();
	});
</script>
<?php include './assets/footer.php' ?>