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
						<form id="edit-profile" class="form-horizontal">
							<div class="span12">
								<div class="widget ">
									<div class="widget-header">
										<i class="icon-user"></i>
										<h3>Account Information</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">											
												<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
												<div class="controls">
													<input type="text" class="span10" id="name" name="name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="mobile"><span class="mendatory">*</span>&nbsp;Mobile</label>
												<div class="controls">
													<input type="text" class="span10" id="mobile" name="mobile" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="email">Email</label>
												<div class="controls">
													<input type="text" class="span10" id="email" name="email" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->

											<div class="control-group">											
												<label class="control-label" for="user_id"><span class="mendatory">*</span>&nbsp;User Id</label>
												<div class="controls">
													<input type="text" class="span10" id="user_id" name="user_id" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="password"><span class="mendatory">*</span>&nbsp;Password</label>
												<div class="controls">
													<input type="text" class="span10" id="password" name="password" value="">
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
												<a href="all-accounts.html" type="submit" class="btn btn-primary">Create Account</a> 
												<button class="btn">Cancel</button>
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
	</body>
</html>
