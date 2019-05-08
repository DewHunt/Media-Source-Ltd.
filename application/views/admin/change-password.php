<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("master/header.php"); ?> 
	</head>
	
	<body>
		<?php include("master/navbar.php"); ?>

		<?php include("master/admin-sub-navbar.php"); ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<form class="form-horizontal" id="account-form" method="POST" action="<?= base_url('index.php/Admin/ChangePasswordAction'); ?>">
							<div class="span12">

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Admin/ChangePassword'); ?>">&times;</a>
											<strong>Great!</strong> Your Account Password Changed Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Admin/ChangePassword'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Account Password Can't Be Changed...
										</div>
								<?php
									}
								?>
								<div class="widget ">
									<div class="widget-header">
										<i class="icon-user"></i>
										<h3>Account<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Change Password</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">											
												<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;New Password</label>
												<div class="controls">
													<input type="text" class="span10" id="new-password" name="new-password" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="mobile"><span class="mendatory">*</span>&nbsp;Confirm Password</label>
												<div class="controls">
													<input type="text" class="span10" id="confirm-password" name="confirm-password" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											<input type="hidden" name="account-id" id="account-id" value="<?= $adminInfo->Id?>">
											<hr>
											
											<div class="form-actions">
												<button type="submit" id="button-account" name="button-account" class="btn btn-primary" onclick="return Validation()">Save Password</button>
												<button type="reset" class="btn btn-danger">Cancel</button>

												<!-- The Toast Message ID -->
												<p id="message"></p>
											</div> <!-- /form-actions -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
							</div>	<!-- /span12 -->
						</form>	<!-- /form --> 
					</div> <!-- /row --> 
				</div>  <!-- /container --> 
			</div> <!-- /main-inner --> 
		</div>  <!-- /main -->

		<?= include("master/footer.php"); ?>
		
		<!-- Custom JS File Start -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.has-sub').click(function(){
					$(this).toggleClass('tap');
				});
			});
			
			function Validation(){
				var newPassword = $('#new-password').val();
				var confirmPassword = $('#confirm-password').val();

				$('#new-password').css({'border':'1px solid #cccccc'});
				$('#confirm-password').css({'border':'1px solid #cccccc'});

				if (newPassword == "")
				{
					Message("Oops! New Password Can't Be Empty. Please Enter New Password.");
					$('#new-password').css({'border':'1px solid red'});
					return false;
				}

				if (confirmPassword == "")
				{
					Message("Oops! Confirm Password Can't Be Empty. Please Enter Confirm Password.");
					$('#confirm-password').css({'border':'1px solid red'});
					return false;
				}

				if (newPassword != confirmPassword)
				{
					Message("Oops! Password Not Matched.");
					$('#confirm-password').css({'border':'1px solid red'});
					return false;
				}
			}
		</script>
	</body>
</html>
