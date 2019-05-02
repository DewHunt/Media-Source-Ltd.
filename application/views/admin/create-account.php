<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include APPPATH.'views/admin/master/header.php'; ?>
	</head>
	
	<body>
		<?php include APPPATH.'views/admin/master/navbar.php'; ?>
		<?php include APPPATH.'views/admin/master/admin-sub-navbar.php'; ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<form class="form-horizontal" id="account-form" method="POST" action="<?= base_url('index.php/Account/CreateAccount'); ?>">
							<div class="span12">

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-success success-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/Account/Account');?>">&times;</a>
											<strong>Great!</strong> Your Account Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Account/Account'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Account Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Account/Account'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Account Already Saved In Data Base...
										</div>
								<?php
									}
								?>
								<div class="widget ">
									<div class="widget-header">
										<i class="icon-user"></i>
										<h3>Account<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Account</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">											
												<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
												<div class="controls">
													<input type="text" class="span10" id="account-name" name="account-name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="mobile"><span class="mendatory">*</span>&nbsp;Mobile</label>
												<div class="controls">
													<input type="text" class="span10" id="account-mobile" name="account-mobile" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="email">Email</label>
												<div class="controls">
													<input type="text" class="span10" id="account-email" name="account-email" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->

											<div class="control-group">											
												<label class="control-label" for="user_id"><span class="mendatory">*</span>&nbsp;User Id</label>
												<div class="controls">
													<input type="text" class="span10" id="account-user-id" name="account-user-id" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="password"><span class="mendatory">*</span>&nbsp;Password</label>
												<div class="controls">
													<input type="text" class="span10" id="account-password" name="account-password" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="account-type"><span class="mendatory">*</span>&nbsp;Account Type</label>
												<div class="controls">
													<select class="dropdown span10" name="account-type" id="account-type">
														<option value="">Select An Accounts Type</option>
														<option value="Admin">Admin</option>
														<option value="Editor">Editor</option>
														<option value="Operator">Operator</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->

											<hr>
											
											<div class="form-actions">
												<button type="submit" id="button-account" name="button-account" class="btn btn-primary" onclick="return Validation()">Create Account</button>
												<button type="reset" class="btn btn-danger">Cancel</button>

												<!-- The Toast Message ID -->
												<p id="message"></p>
											</div> <!-- /form-actions -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
							</div>	<!-- /span12 -->
						</form>	<!-- /form -->
					</div>	<!-- /row --> 
				</div>	<!-- /container --> 
			</div>	<!-- /main-inner --> 
		</div>	<!-- /main -->

		<?php include APPPATH.'views/admin/master/footer.php'; ?>

		<!-- Custome JS File Include -->
		<script type="text/javascript">
			function Validation(){
				var accountName = $('#account-name').val();
				var accountMobile = $('#account-mobile').val();
				var accountUserId = $('#account-user-id').val();
				var accountPassword = $('#account-password').val();
				var accountType = $('#account-type').val();

				$('#account-name').css({'border':'1px solid #cccccc'});
				$('#account-mobile').css({'border':'1px solid #cccccc'});
				$('#account-email').css({'border':'1px solid #cccccc'});
				$('#account-user-id').css({'border':'1px solid #cccccc'});
				$('#account-password').css({'border':'1px solid #cccccc'});
				$('#account-type').css({'border':'1px solid #cccccc'});

				if (accountName == "")
				{
					Message("Oops! Account Name Can't Be Empty. Please Enter Account Name.");
					$('#account-name').css({'border':'1px solid red'});
					return false;
				}

				if (accountMobile == "")
				{
					Message("Oops! Phone Can't Be Empty. Please Enter Phone.");
					$('#account-mobile').css({'border':'1px solid red'});
					return false;
				}

				if (accountUserId == "")
				{
					Message("Oops! User Id Can't Be Empty. Please Enter User Id.");
					$('#account-user-id').css({'border':'1px solid red'});
					return false;
				}

				if (accountPassword == "")
				{
					Message("Oops! Password Can't Be Empty. Please Enter Password ");
					$('#account-password').css({'border':'1px solid red'});
					return false;
				}

				if (accountType == "")
				{
					Message("Oops! Account Type Can't Be Empty. Please Select Account Type ");
					$('#account-type').css({'border':'1px solid red'});
					return false;
				}
			}
		</script>
	</body>
</html>
