<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include APPPATH.'views/admin/master/header.php'; ?>
	</head>
	
	<body>
		<?php include APPPATH.'views/admin/master/navbar.php'; ?>

		<?php include APPPATH.'views/admin/master/system-sub-navbar.php'; ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<form id="edit-profile" class="form-horizontal">
							<div class="span12">
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Advertise Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Sub Brand<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Sub Brand</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">                     
												<label class="control-label" for="compnay">Company</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value="">Select Company</option>
														<option value="">ABC Real State Ltd.</option>
														<option value="">Abul Khair Group</option>
														<option value="">Bata</option>
														<option value="">Basic Bank Ltd.</option>
														<option value="">Global Brand</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="brand">Brand</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value="">Select Brand</option>
														<option value="">Rapoo</option>
														<option value="">Topo Link</option>
														<option value="">Asus</option>
														<option value="">Zebex</option>
														<option value="">Sewoo</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="name">Name</label>
												<div class="controls">
													<input type="text" class="span10" id="name" name="name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="description">Description</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="description" name="description"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<a href="client.html" type="submit" class="btn btn-primary">Create Company</a> 
												<button class="btn">Cancel</button>
											</div> <!-- /form-actions -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
								<!-- /widget --> 
							</div>
							<!-- /span12 -->
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
