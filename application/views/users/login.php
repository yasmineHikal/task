<?php echo form_open('users/login'); ?>
<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><?php echo $title; ?></div>
				<div class="card-body">
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Enter Email" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
			</div>
		</div>
	</div>
<?php echo form_close(); ?>
