<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('master/admin-header.php'); ?>
	</head>
	
	<body>
		<?php include('master/admin-navbar.php'); ?>
		<?php include('master/admin-sub-navbar.php'); ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					
					<div class="row">
						<form id="edit-profile" class="form-horizontal">
							<div class="span6">
								<div class="widget">
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
													<input type="text" class="span3" id="name" name="name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="phone">Phone</label>
												<div class="controls">
													<input type="text" class="span3" id="phone" name="phone" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="mobile">Mobile</label>
												<div class="controls">
													<input type="text" class="span3" id="mobile" name="mobile" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="email">Email</label>
												<div class="controls">
													<input type="text" class="span3" id="email" name="email" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="web_address">Web Address</label>
												<div class="controls">
													<input type="text" class="span3" id="web-address" name="web_address" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="permanent_address">Permanent Address</label>
												<div class="controls">
													<textarea class="span3" rows="3" id="permanent_address" name="permanent_address"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="present_address">Present Address</label>
												<div class="controls">
													<textarea class="span3" rows="3" id="present_address" name="present_address"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">								
												<label class="control-label" for="office_address">Office Address</label>
												<div class="controls">
													<textarea class="span3" rows="3" id="office_address" name="office_address"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="office_contact">Office Phone/Mobile</label>
												<div class="controls">
													<input type="text" class="span3" id="office_contact" name="office_contact" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
								<!-- /widget --> 
							</div>
							<!-- /span6 -->
							
							<div class="span6">
								<div class="widget">
									<div class="widget-header">
										<i class="icon-user"></i>
										<h3>Service Provided</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">									
												<label class="control-label" for="service">Service</label>
												
												<div class="controls">
													<label class="checkbox inline">
														<input type="checkbox" name="news_alert"> News Alerts
													</label>
													
													<label class="checkbox inline">
														<input type="checkbox" name="news_clippings"> News Clippings
													</label>
												</div>		<!-- /controls -->		
											</div> <!-- /control-group -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
								<!-- /widget --> 
							</div>
							<!-- /span6 -->
							
							<div class="span6">
								<div class="widget">
									<div class="widget-header">
										<i class="icon-user"></i>
										<h3>Accessibility</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">                     
												<label class="control-label" for="news-paper">News Paper</label>
												<div class="controls">
													<select multiple class="chosen-select">
														<option value="Prothom Alo">Prothom Alo</option>
														<option value="Bangladesh Protidin">Bangladesh Protidin</option>
														<option value="Amader Somoy">Amader Somoy</option>
														<option value="Somokal">Somokal</option>
														<option value="Ittefaq">Ittefaq</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="company-name">Comapny Name</label>
												<div class="controls">
													<select multiple class="chosen-select">
														<option value="Basundhara Group">Basundhara Group</option>
														<option value="Square Group">Square Group</option>
														<option value="Confidence Group">Confidence Group</option>
														<option value="Meghna Group of Industries">Meghna Group of Industries</option>
														<option value="Nasir Group">Nasir Group</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="brand-name">Brand Name</label>
												<div class="controls">
													<select multiple class="chosen-select">
														<option value="Meghna Cement Mills Limited">Meghna Cement Mills Limited</option>
														<option value="Bashundhara Paper Mills Limited">Bashundhara Paper Mills Limited</option>
														<option value="Bashundhara LP Gas Limited">Bashundhara LP Gas Limited</option>
														<option value="Bashundhara Steel Complex Limited">Bashundhara Steel Complex Limited</option>
														<option value="Bashundhara Food and Beverage industries Limited">Bashundhara Food and Beverage industries Limited</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="subbrand-name">Sub Brand Name</label>
												<div class="controls">
													<select multiple class="chosen-select">
														<option value="Bashundhara Retail Commodity">Bashundhara Retail Commodity</option>
														<option value="Bashundhara Bulk Commodity">Bashundhara Bulk Commodity</option>
														<option value="Bashundhara Suji">Bashundhara Suji</option>
														<option value="Bashundhara Snacks">Bashundhara Snacks</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="products-name">Products Name</label>
												<div class="controls">
													<select multiple class="chosen-select">
														<option value="Bashundhara Ata">Bashundhara Ata</option>
														<option value="Bashundhara Maida">Bashundhara Maida</option>
														<option value="Bashundhara Suji">Bashundhara Suji</option>
														<option value="Bashundhara Edible Oil">Bashundhara Edible Oil</option>
														<option value="Bashundhara Instant Noodles">Bashundhara Instant Noodles</option>
														<option value="Bashundhara Twist Pasta">Bashundhara Twist Pasta</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="from-date">From Date</label>
												<div class="controls">
													<input class="fromDatePicker" type="text" name="fromDate">
												</div>	<!-- /controls -->       
											</div>	<!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="to-date">To Date</label>
												<div class="controls">
													<input class="toDatePicker" type="text" name="toDate">
												</div>	<!-- /controls -->       
											</div>	<!-- /control-group -->
										</fieldset>
									</div>	<!-- /widget-content -->
								</div>	<!-- /widget -->
							</div>	<!-- /span9 -->
							
							<div class="span12">
								<div class="widget">
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
													<input type="text" class="span9" id="user_id" name="user_id" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="password">Password</label>
												<div class="controls">
													<input type="text" class="span9" id="password" name="password" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<a href="client.html" type="submit" class="btn btn-primary">Create Client</a> 
												<button class="btn">Cancel</button>
											</div> <!-- /form-actions -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
								<!-- /widget --> 
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

		<?php include('master/admin-footer.php'); ?> 
		
		<script>
			$(function(){
				$('.fromDatePicker').datepicker();
				$('.toDatePicker').datepicker();
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$(".chosen-select").chosen({
					width: "100%"
				});
			});
		</script>
	</body>
</html>
