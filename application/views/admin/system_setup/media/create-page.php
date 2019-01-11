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
										<h3>Media Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Page<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Page</h3>
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
														<option value="">Select Media</option>
														<option value="">Computer Jagat</option>
														<option value="">Alokito Bangladesh</option>
														<option value="">Amader Somoy</option>
														<option value="">Amar Desh</option>
														<option value="">Bangladesh Partidin</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="publication">Publication</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value="">Select Publication</option>
														<option value="">General</option>
														<option value="">Supplementary</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="day">Day</label>
												<div class="controls">
													<select class="dropdown span10">
														<option value="">Select Day</option>
														<option value="">All Days</option>
														<option value="">Saturday</option>
														<option value="">Sunday</option>
														<option value="">Monday</option>
														<option value="">Tuesday</option>
														<option value="">Wednesday</option>
														<option value="">Thursday</option>
														<option value="">Friday</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="price-details">Price Details</label>
												<div class="controls">
													<table class="table table-striped table-bordered">
														<thead>
															<tr>
																<td>SL</td>
																<td>Price Title</td>
																<td>Select Pages</td>
																<td>Hue</td>
																<td>Column</td>
																<td>*</td>
																<td>Inch</td>
																<td>Price</td>
																<td>Remark</td>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>01</td>
																<td>
																	<input type="text" class="span1" id="price-title" name="price-title" value="">
																</td>
																<td>
																	<select class="dropdown span2">
																		<option value="">Select</option>
																		<option value="2nd Cover Page">2nd Cover Page</option>
																		<option value="3rd Cover Page">3rd Cover Page</option>
																		<option value="5th Page">5th Page</option>
																		<option value="7th Page">7th Page</option>
																		<option value="9th Page">9th Page</option>
																		<option value="Back Before">Back Before</option>
																		<option value="Back Cover">Back Cover</option>
																		<option value="Back Folding Page">Back Folding Page</option>
																		<option value="Back Inside">Back Inside</option>
																		<option value="Back Inside Cover">Back Inside Cover</option>
																		<option value="Back Page">Back Page</option>
																		<option value="Back Page (Color)">Back Page Color</option>
																		<option value="Banner">Banner</option>
																		<option value="Business">Business</option>
																		<option value="Business Front">Business Front</option>
																		<option value="Business Back">Business Back</option>
																	</select>
																</td>
																<td>
																	<select class="dropdown span2">
																		<option value="">Select</option>
																		<option value="3rd Cover Page">Black & White</option>
																		<option value="5th Page">Color</option>
																	</select>
																</td>
																<td>
																	<input type="text" class="span1" id="column" name="column" value="1">
																</td>
																<td>*</td>
																<td>
																	<input type="text" class="span1" id="inch" name="inch" value="1">
																</td>
																<td>
																	<input type="text" class="span1" id="price" name="price" value="">
																</td>
																<td>                               
																	<input type="text" class="span1" id="remarks" name="remarks" value="">
																</td>
															</tr>
														</tbody>
													</table>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<a href="client.html" type="submit" class="btn btn-primary">Create Page</a> 
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
