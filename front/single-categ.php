<!-- Header -->
<?php $page_title = "Dashboard" ?>
<?php include './assets/header.php' ?>

	<section id="hero" style="background-color: #AAA; background-position: center; background-size: cover">
		<h1>Design</h1>
	</section>

	<div class="container">
		<section id="blogs">
			<h1>blogs</h1>
		</section>
	</div>


<script src="assets/js/jquery.min.js"></script>
<script>

	var url = window.location.href,
		id = url.substring(url.lastIndexOf('?') + 1);

	$.ajax({
		type: 'GET',
		url: 'http://localhost/rest/api/api.php/general/1',
		success: function(option){
			$('h1').css('color', option.text_colors);
			$('#hero').css('backgroundImage', 'url('+option.section_image+')')
		},
		error: function(){
			console.log('ERROR!')
		}
	});

	$.ajax({
		type: 'GET',
		url: 'http://localhost/rest/api/api.php/posts?transform=1',
		success: function(items){
			$.each(items, function(i, item) {
				$.each(item, function(i, item) {
					if (item.show_date <= item.post_date){
						if (item.cateogry_id == id) {
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
						}
					}

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