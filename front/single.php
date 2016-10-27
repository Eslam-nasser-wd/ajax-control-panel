<!-- Header -->
<?php $page_title = "Dashboard" ?>
<?php include './assets/header.php' ?>

	<article id="singlePost">
		
	</article>

	<a href="index.php" class="back-btn">< Back</a>


<script src="assets/js/jquery.min.js"></script>
<script>
	var url = window.location.href,
		id = url.substring(url.lastIndexOf('?') + 1);

	$.ajax({
		type: 'GET',
		url: 'http://localhost/rest/api/api.php/posts?filter=id,eq,'+id,
		success: function(item){
			$('#singlePost').append(`
					<div class="image" style="background-image: url(`+item.posts.records[0][5]+`);">
						<h2>`+item.posts.records[0][1]+`</h2>
						<div class="light-layer"></div>
					</div>
					<span class="date">20/10/2016 12:40pm</span>
					<p>
						`+item.posts.records[0][2]+`
					</p>
				`)
		},
		error: function(){
			console.log('ERROR!!!')
		}
	});
</script>
<!-- Footer -->
<?php include './assets/footer.php' ?>