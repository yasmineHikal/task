<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><?php echo $title; ?></div>
				<div class="card-body">
					<?php foreach($users as $user) : ?>
						<h4><?php echo $user['name']; ?></h4>

						<div class="row">

							<div class="col-md-6">
								<small class="post-date">Email: <?php echo $user['email']; ?>
								</small><br>

								<small class="post-date">Joined at: <?php echo $user['created_at']; ?>
								</small><br>
							</div>
							<div class="col-md-6">
								<?php if($this->session->userdata('user_id') ):?>
									<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>users/edit/<?php echo $user['id']; ?>">Edit</a>
									<?php echo form_open('/users/delete/'.$user['id']); ?>
									<input type="submit" value="Delete" class="btn btn-danger">
									</form>
								<?php endif; ?>
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
