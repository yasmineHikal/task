
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><?php echo $title; ?></div>
				<div class="card-body">
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="title" placeholder="Add Title">
					</div>
					<div class="form-group">
						<label>Body</label>
						<textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
					</div>
					<div class="form-group">
						<label>Upload Image</label>
						<input type="file" name="userfile" size="20">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				</div>
			</div></div>
	</div></div>
