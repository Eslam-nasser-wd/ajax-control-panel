<?php $page_title = "Add Blog Post" ?>
<?php include './assets/header.php' ?>
<?php include './assets/parts/sidebar.php' ?>

<section id="rightSide">
	<div class="add-blog cf">
		<form action="">
			<div class="input-warpper">
				<label>Title</label>
				<input type="text" placeholder="Title">
			</div>
			<div class="input-warpper">
				<label>Content</label>
				<textarea placeholder="Content" rows="5"></textarea>
			</div>
			<div class="input-warpper cf">
				<div class="half">
					<label>Writer</label>
					<select id="writer">
						<option value="eslam">Eslam</option>
						<option value="mohamed">Mohamed</option>
					</select>
				</div>
				<div class="half">
					<label>Category</label>
					<select id="category">
						<option value="design">Web Design</option>
						<option value="develop">Web Developemnt</option>
					</select>
				</div>
			</div>
			<button type="submit">Submit!</button>
		</form>
	</div>
</section>

<?php include './assets/footer.php' ?>