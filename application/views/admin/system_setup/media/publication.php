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
									<h3>All Publication Information</h3>
									<a href="<?= base_url('index.php/Publication/Publication'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Publication</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Media</th>
												<th>Name</th>
												<th>Type</th>
												<th>Frequency</th>
												<th>Place</th>
												<th>Language</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td>01</td>
												<td>Bangladesh Partidin</td>
												<td>General</td>
												<td>Newspaper</td>
												<td>Dhaka</td>
												<td>Daily</td>
												<td>Bangla</td>
												<td>Daily Newspaper</td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>
												<td>02</td>
												<td>Daily Star</td>
												<td>Life Style</td>
												<td>Suplimentary</td>
												<td>Weekly</td>
												<td>Dhaka</td>
												<td>English</td>
												<td>Tabulate Paper Size[Tuesday]</td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>
												<td>03</td>
												<td>Prothom Alo</td>
												<td>Rosh Alo</td>
												<td>Suplimentary</td>
												<td>Weekly</td>
												<td>Dhaka</td>
												<td>Bangla</td>
												<td>Tabulate Paper Size[Monday]</td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>
												<td>04</td>
												<td>Prothom Alo</td>
												<td>Chutir Dine</td>
												<td>Suplimentary</td>
												<td>Weekly</td>
												<td>Dhaka</td>
												<td>Bangla</td>
												<td>Tabulate Paper Size[Saturday]</td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>
												<td>05</td>
												<td>Prothom Alo</td>
												<td>Naksha</td>
												<td>Suplimentary</td>
												<td>Weekly</td>
												<td>Dhaka</td>
												<td>Bangla</td>
												<td>Tabulate Paper Size[Tuesday]</td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
										</tbody>
									</table>
								</div>  <!-- /widget-content --> 
							</div>  <!-- /widget --> 
						</div>  <!-- /span9 -->
					</div> <!-- /row --> 
				</div>  <!-- /container --> 
			</div>  <!-- /main-inner --> 
		</div>  <!-- /main -->

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
