<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("master/header.php"); ?> 
	</head>
	
	<body>
		<?php include("master/navbar.php"); ?>

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
										<tr>
											<th>Name</th>
											<td><?= $adminInfo->Name; ?></td>
										</tr>
										
										<tr>
											<th>Mobile</th>
											<td><?= $adminInfo->Phone; ?></td>
										</tr>
										
										<tr>
											<th>Email</th>
											<td><?= $adminInfo->Email; ?></td>
										</tr>
										
										<tr>
											<th>User Name</th>
											<td><?= $adminInfo->UserId; ?></td>
										</tr>
									</table>
								</div>  <!-- /widget-content --> 
							</div> <!-- /widget --> 
						</div>  <!-- /span9 --> 
					</div> <!-- /row --> 
				</div>  <!-- /container --> 
			</div> <!-- /main-inner --> 
		</div>  <!-- /main -->

		<?= include("master/footer.php"); ?>
		
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
