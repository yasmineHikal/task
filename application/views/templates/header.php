<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Task</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet" type="text/css">


	<!-- Styles -->
	<link href="<?php echo base_url();?>assets/css/app.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div id="app">
	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>home">
				Task
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Left Side Of Navbar -->
				<ul class="navbar-nav mr-auto">

				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
					<?php if(!$this->session->userdata('logged_in')) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url();?>users/login">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url();?>users/register">Register</a>
					</li>
					<?php endif; ?>
					<?php if($this->session->userdata('logged_in')) : ?>
						<li class="nav-item">
							<a class="nav-link"  href="<?php echo base_url(); ?>posts/create">Create Post</a>
						</li>
						<li class="nav-item">
							<a class="nav-link"  href="<?php echo base_url(); ?>users/index">User CRUD</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>

	<main class="py-4">

		<div class="row justify-content-center">
		<!-- Flash messages -->
		<?php if($this->session->flashdata('user_registered')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_created')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('login_failed')): ?>
			<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_loggedin')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_loggedout')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_deleted')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_deleted').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_updated')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_updated').'</p>'; ?>
		<?php endif; ?>






		</div>
