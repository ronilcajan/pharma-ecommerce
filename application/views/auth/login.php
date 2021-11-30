<form action="<?= site_url('auth/login') ?>" method="POST">

	<div class="container container-login animated fadeIn">

		<h3 class="text-center">Sign In Here</h3>
		<?php if (!empty($message) || $this->session->flashdata('message')) : ?>
			<div class="alert alert-<?= $this->session->flashdata('success'); ?>" role="alert">
				<?= !empty($message) ? $message : $this->session->flashdata('message') ?>
			</div>
		<?php endif ?>
		<div class="login-form">
			<div class="form-group form-floating-label">
				<input id="username" name="identity" type="text" class="form-control input-border-bottom" required>
				<label for="username" class="placeholder">Username</label>
			</div>
			<div class="form-group form-floating-label">
				<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
				<label for="password" class="placeholder">Password</label>
				<div class="show-password">
					<i class="icon-eye"></i>
				</div>
			</div>
			<div class="row form-sub m-0">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="remember" id="rememberme" value="1">
					<label class="custom-control-label" for="rememberme">Remember Me</label>
				</div>

				<!-- <a href="forgot_password" class="link float-right">Forgot Password?</a> -->
			</div>
			<div class="form-action mb-3">
				<button type="submit" class="btn btn-dark btn-rounded btn-login">Sign In</button>
			</div>
			<div class="login-account">
				<span class="msg">Don't have an account? </span>
				<a href="<?= site_url('register'); ?>" class="link text-dark">Register Here</a>
			</div>
		</div>
	</div>
</form>