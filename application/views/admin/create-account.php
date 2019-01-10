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
							<div class="span6">
								<div class="widget ">
									<div class="widget-header">
										<i class="icon-user"></i>
										<h3>Contact Information</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">											
												<label class="control-label" for="name">Name</label>
												<div class="controls">
													<input type="text" class="span4" id="name" name="name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="phone">Phone</label>
												<div class="controls">
													<input type="text" class="span4" id="phone" name="phone" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="mobile">Mobile</label>
												<div class="controls">
													<input type="text" class="span4" id="mobile" name="mobile" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="email">Email</label>
												<div class="controls">
													<input type="text" class="span4" id="email" name="email" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="web_address">Web Address</label>
												<div class="controls">
													<input type="text" class="span4" id="web-address" name="web_address" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="permanent_address">Permanent Address</label>
												<div class="controls">
													<textarea class="span4" rows="3" id="permanent_address" name="permanent_address"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="present_address">Present Address</label>
												<div class="controls">
													<textarea class="span4" rows="3" id="present_address" name="present_address"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
							</div>
							<!-- /span6 -->
							
							<div class="span6">
								<div class="widget ">
									<div class="widget-header">
										<i class="icon-user"></i>
										<h3>Login Information</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">											
												<label class="control-label" for="user_id">User Id</label>
												<div class="controls">
													<input type="text" class="span4" id="user_id" name="user_id" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="password">Password</label>
												<div class="controls">
													<input type="text" class="span4" id="password" name="password" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="account-type">Account Type</label>
												<div class="controls">
													<select>
														<option value="">Select An Accounts Type</option>
														<option value="Prothom Alo">Editor</option>
														<option value="Bangladesh Protidin">Operator</option>
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
							</div>
							<!-- /span6 -->
						</form> 
					</div>
					<!-- /row --> 
				</div>
				<!-- /container --> 
			</div>
			<!-- /main-inner --> 
		</div>
		<!-- /main -->

		<?php include APPPATH.'views/admin/master/footer.php'; ?>
	</body>
</html>
