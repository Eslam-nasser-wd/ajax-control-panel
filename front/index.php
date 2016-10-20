<!-- Header -->
<?php $page_title = "Dashboard" ?>
<?php include './assets/header.php' ?>

	<section id="hero" style="background-image: url(assets/img/1.jpg);">
		<h1>Home</h1>
	</section>

	<div class="container">
		<section id="blogs">
			<h1>blogs</h1>
		</section>
	</div>


<script src="assets/js/jquery.min.js"></script>
<script>
	$.ajax({
		type: 'GET',
		url: 'http://localhost/rest/api/api.php/posts?transform=1',
		success: function(items){
			$.each(items, function(i, item) {
				$.each(item, function(i, item) {
					$('#blogs').append(`
						<a href="single.php?`+item.id+`">
							<div class="single-blog">
								<div class="image">
									<img src="`+item.image_url+`" alt="`+item.post_title+`">
								</div>
								<div class="text">
									<h3>`+item.post_title+`</h3>
									<p>
										`+item.post_description+`
									</p>
								</div>
							</div>
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
<!-- Footer -->
<?php include './assets/footer.php' ?>