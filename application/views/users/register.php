<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><?php echo $title; ?></div>
				<div class="card-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name" placeholder="Name">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
