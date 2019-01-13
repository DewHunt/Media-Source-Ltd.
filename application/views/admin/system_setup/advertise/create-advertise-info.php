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
										<h3>Advertise Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Advertise Info<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Advertise Info</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">											
												<label class="control-label" for="advertise-id">Advetise Id</label>
												<div class="controls">
													<input type="text" class="span10" id="advertise-id" name="advertise-id" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="title">Title</label>
												<div class="controls">
													<input type="text" class="span10" id="title" name="title" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="company">Company</label>
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
												<label class="control-label" for="subbrand">Sub Brand</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value="">Select Sub Brand</option>
														<option value="">Asus Zenfone Mobile</option>
														<option value="">Asus Laptop</option>
														<option value="">Asus Gaming Notebook</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="product">Product</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value="">Select Product</option>
														<option value="">Achar</option>
														<option value="">Adhesive</option>
														<option value="">Aerosol</option>
														<option value="">Argent Banking</option>
														<option value="">Air Compressor</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="advertise-type">Advertise Type</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value="">Select Advertise Type</option>
														<option value="">Government</option>
														<option value="">Private</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="notes">Notes</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="notes" name="notes"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="advertise-theme">Advertise Theme</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="advertise-theme" name="advertise-theme"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="image">Image</label>
												<div class="controls">
													<input type="file" name="image" id="image">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<a href="client.html" type="submit" class="btn btn-primary">Create Advertise Info</a> 
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
