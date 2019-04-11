<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include APPPATH.'views/admin/master/header.php'; ?>
	</head>
	
	<body>
		<?php include APPPATH.'views/admin/master/navbar.php'; ?>

		<?php include APPPATH.'views/admin/master/data-entry-sub-navbar.php'; ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<div class="span12">

							<?php
								if ($message == 1)
								{
							?>
									<div class="alert alert-success success-message">
										<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/DataEntry/Index');?>">&times;</a>
										<strong>Be patient!</strong> Advertise Entry Is In Pregress...
									</div>
							<?php
								}
							?>
						</div>
						<?php include APPPATH.'views/admin/master/data-entry-left-menu.php'; ?>
						
						<div class="span9">
							<div class="row">								
								<div class="span9">
									<div class="widget">
										<div class="widget-header">
											<i class="icon-list-alt"></i>
											<h3>Data Entry Menu</h3>
										</div>
										<!-- /widget-header -->
										<div class="widget-content">
											<div class="shortcuts">
												<a href="<?= base_url('index.php/DataEntry/Index/1'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Advertise Entry</span>
												</a>
												<a href="<?= base_url('index.php/NewsEntry/Index/'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">News Entry</span> 
												</a> 
											</div>
											<!-- /shortcuts --> 
										</div>
										<!-- /widget-content --> 
									</div>
									<!-- /widget -->
								</div>	<!-- /span9 --> 
							</div>
							<!-- /row -->
						</div>
					</div>	<!-- /row -->
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
