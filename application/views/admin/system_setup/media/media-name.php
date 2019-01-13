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
									<h3>All Media Name Information</h3>
									<a href="<?= base_url('index.php/MediaName/MediaName'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Media Name</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Owner</th>
												<th>Phone / Mobile</th>
												<th>Email</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td>01</td>
												<td>Amader Shomoy</td>
												<td>New Vision Limited</td>
												<td>8878213-18</td>
												<td>mktshomoy@gmail.com</td>
												<td><img src="<?= base_url('images/logo/das_logo.jpg'); ?>" width="150px" height="150px"></td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>                        
												<td>02</td>
												<td>Jugantor</td>
												<td>Jamuna Group</td>
												<td>8419211-5</td>
												<td>jugantor.mail@gmail.com</td>
												<td><img src="<?= base_url('images/logo/dj_logo.jpg'); ?>" width="150px" height="150px"></td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>                        
												<td>03</td>
												<td>Kaler Kantho</td>
												<td>Green Media Limilted</td>
												<td>09612120000</td>
												<td>  info@kalerkantho.com</td>
												<td><img src="<?= base_url('images/logo/dkk_logo.png'); ?>" width="150px" height="150px"></td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>                        
												<td>04</td>
												<td>Bangladesh Pratidin</td>
												<td>East West Media Group Limited</td>
												<td>09612120000</td>
												<td>bdpratidin@gmail.com</td>
												<td><img src="<?= base_url('images/logo/dbp_logo.jpg'); ?>" width="150px" height="150px"></td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
											
											<tr>                        
												<td>05</td>
												<td>Prothom Alo</td>
												<td>Transcom Group</td>
												<td>01733991755</td>
												<td>adprothomalo@gmail.com</td>
												<td><img src="<?= base_url('images/logo/dpa_logo.jpg'); ?>" width="100px" height="100px"></td>
												<td>
													<a href="" class="btn btn-info">Edit</a>                        
													<a href="" class="btn btn-danger">Delete</a>                          
												</td>
											</tr>
										</tbody>
									</table>
								</div>  <!-- /widget-content --> 
							</div>  <!-- /widget --> 
						</div>   <!-- /span9 -->
					</div>  <!-- /row -->
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
