<!DOCTYPE html>
<html lang="en">
	
	<head>
		<?php include("master/header.php"); ?>		
	</head>
	
	<body>		
		<div class="navbar navbar-fixed-top">			
			<div class="navbar-inner">				
				<div class="container">					
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>					
					<a class="brand" href="index.html">
						Media Source Ltd.				
					</a>					
				</div> <!-- /container -->				
			</div> <!-- /navbar-inner -->			
		</div> <!-- /navbar -->		
		
		<div class="account-container">			
			<div class="content clearfix">
				<form method="POST" action="<?= base_url('index.php/Admin/Login'); ?>" accept_charset="utf-8">

					<?php
						if ($message == 1)
						{
					?>
							<div class="alert alert-info error-message">
								<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Admin/Index'); ?>">&times;</a>
								<strong>Oops!</strong> User Name or Password Inccorect
							</div>
					<?php
						}
					?>
					<!-- <h1>Admin Login</h1> -->
					<h1 style="text-align: center;">Login</h1>

					<div class="login-fields">						
						<p>Please provide your details</p>

						<div class="field">
							<label for="username">Username</label>
							<input type="text" id="username" name="user-name" value="" placeholder="Username" class="login username-field" />
						</div> <!-- /field -->
						
						<div class="field">
							<label for="password">Password:</label>
							<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
						</div> <!-- /password -->						
					</div> <!-- /login-fields -->
					
					<div class="login-actions">						
						<span class="login-checkbox">
							<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
							<label class="choice" for="Field">Keep me signed in</label>
						</span>
						
						<button class="button btn btn-success btn-large">Sign In</button>
					</div> <!-- .actions -->
				</form>
			</div> <!-- /content -->			
		</div> <!-- /account-container -->		
		
		<div class="login-extra">
			<a href="#">Reset Password</a>
		</div> <!-- /login-extra -->

		<?php include("master/footer.php"); ?>
		
	</body>
	
</html>
