<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("master/admin-header.php"); ?> 
	</head>
	
	<body>
		<?php include("master/admin-navbar.php"); ?>

		<?php include("master/admin-sub-navbar.php"); ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<?php include("master/admin-left-menu.php"); ?>

						<div class="span9">
							<div class="widget widget-table action-table">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>Admin's Profile</h3>
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th colspan="2"><h1>Dew Hunt</h1></th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<th>Name</th>
												<td>Salman Sabbir</td>
											</tr>
											
											<tr>
												<th>Mobile</th>
												<td>+88 017 66 328 322</td>
											</tr>
											
											<tr>
												<th>Email</th>
												<td>dew@gmail.com</td>
											</tr>
											
											<tr>
												<th>User Name</th>
												<td>Dew Hunt</td>
											</tr>
										</tbody>
									</table>
								</div>  <!-- /widget-content --> 
							</div> <!-- /widget --> 
						</div>  <!-- /span9 --> 
					</div> <!-- /row --> 
				</div>  <!-- /container --> 
			</div> <!-- /main-inner --> 
		</div>  <!-- /main -->

		<?= include("master/admin-footer.php"); ?>
		
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
