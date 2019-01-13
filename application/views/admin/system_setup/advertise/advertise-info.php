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
						<?php include APPPATH.'views/admin/master/system-left-menu.php'?>
						
						<div class="span9">
							<div class="widget widget-table action-table">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>All Advertise Info Information</h3>
									<a href="<?= base_url('index.php/AdvertiseInfo/AdvertiseInfo'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Adeverise Info</a> 
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Title</th>
												<th>Brand Name</th>
												<th>Notes</th>
												<th>Action</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td>01</td>
												<td>Caption 01</td>
												<td>Bkash</td>
												<td>Notes 01</td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>
												<td>02</td>
												<td>Caption 02</td>
												<td>LG</td>
												<td>Notes 02</td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>
												<td>03</td>
												<td>Caption 03</td>
												<td>Airtel</td>
												<td>Notes 03</td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>
												<td>04</td>
												<td>Caption 04</td>
												<td>AIUB</td>
												<td>Notes 04</td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>
												<td>05</td>
												<td>Caption 05</td>
												<td>DFBL</td>
												<td>Notes 05</td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
										</tbody>
									</table>
								</div>	<!-- /widget-content --> 
							</div>	<!-- /widget --> 
						</div>	<!-- /span9 -->
					</div> <!-- /row --> 
				</div>	<!-- /container --> 
			</div>	<!-- /main-inner --> 
		</div>	<!-- /main -->

		<?php include APPPATH.'views/admin/master/footer.php'; ?>
		
		<!-- Custom JS File Start -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.has-sub').click(function(){
					$(this).toggleClass('tap');
				});
			});
		</script>
	</body>
</html>
