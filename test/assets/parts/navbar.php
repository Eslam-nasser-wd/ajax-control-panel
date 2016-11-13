<nav>
	<ul>
		<a href="./">
			<li>Home</li>
		</a>
		<a href="#">
			<li class="categories">
				Categories
				<ul class="dropdown">
					<!-- Li's will be here -->
				</ul>
			</li>
		</a>
	</ul>
</nav>


<script>
	$.ajax({
		type: 'GET',
		url: 'http://localhost/rest/api/api.php/categories?transform=1',
		success: function(items){
			$.each(items, function(i, item) {
				$.each(item, function(i, item) {
					$('nav li.categories ul').append(`
						<a href="single-categ.php?`+item.id+`">
							<li>`+item.name+`</li>
						</a>
					`)
				});
			});
		},
		error: function(){
			console.log('ERROR!!!')
		}
	});
</script>