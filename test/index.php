<?php include 'assets/header.php' ?>


<div class="cards-warpper">
	
</div><!--/cards-warpper-->


<script>
	$.ajax({
		type: 'GET',
		url: 'https://jsonplaceholder.typicode.com/users',
		success: function(items){
			console.log('Done !')
			$.each(items, function(i, item){
				$('.cards-warpper').append(`
						<div class="card">  
							<span class="id">`+item.id+` &nbsp; &copy; </span>
							<h2 class="name">`+item.name+`</h2>
							<h5>`+item.username+`</h5>
							<hr>
							<ul>
								<li>Email: `+item.email+`</li>
								<li>Phone: `+item.phone+`</li>
								<li>Address: `+item.address.street+`</li>
								<li>Website: <a href="http://`+item.website+`">`+item.website+`</a></li>
							</ul>
						</div>
					`)
			})
		},
		error: function(){
			console.log('Error !')
		}
	})
</script>
<?php include 'assets/footer.php' ?>