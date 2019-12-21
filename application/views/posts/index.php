<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><?php echo $title; ?></div>
				<div class="card-body">
					<?php foreach($posts as $post) : ?>
						<h4><?php echo $post['title']; ?></h4>

						<div class="row">
							<div class="col-md-4">
								<img class="img-thumbnail" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
							</div>
							<div class="col-md-8">
								<small class="post-date">Posted on: <?php echo $post['created_at']; ?>
								</small><br>
								<?php echo word_limiter($post['body'], 60); ?>
								<br><br>
							</div>
						</div>
					<hr/>
					<?php endforeach; ?>
					<div class="pagination-links">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
