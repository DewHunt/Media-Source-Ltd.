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
										<h3>Media Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Publication<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Publication</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">											
												<label class="control-label" for="name">Name</label>
												<div class="controls">
													<input type="text" class="span10" id="name" name="name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="media">Media</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="publication-type">Publication Type</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="publication-place">Publication Place</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="publication-frequency">Publication Frequency</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="publication-language">Publication Language</label>
												
												<div class="controls">
													<label class="checkbox inline" for="bangla">
														<input type="checkbox" name="bangla">&nbsp;&nbsp;Bangla
													</label>
													
													<label class="checkbox inline" for="english">
														<input type="checkbox" name="English">&nbsp;&nbsp;English
													</label>
												</div>		<!-- /controls -->		
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="description">Description</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="description" name="description"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">                   
												<label class="control-label" for="logo">Logo</label>
												<div class="controls">
													<input type="file" name="image" id="image">
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<a href="client.html" type="submit" class="btn btn-primary">Create Publication</a> 
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
