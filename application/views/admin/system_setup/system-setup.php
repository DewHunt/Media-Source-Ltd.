<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include APPPATH.'views/admin/master/header.php'; ?>
	</head>
	
	<body>
		<?php include APPPATH.'views/admin/master/navbar.php'; ?>

		<?php include APPPATH.'views/admin/master/system-sub-navbar.php';?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<?php include APPPATH.'views/admin/master/system-left-menu.php'; ?>
						
						<div class="span9">
							<div class="row">
								<div class="span9">
									<div class="widget">
										<div class="widget-header">
											<i class="icon-list-alt"></i>
											<h3>Media Setup Menu</h3>
										</div>
										<!-- /widget-header -->
										<div class="widget-content">
											<div class="shortcuts">
												<a href="<?= base_url('index.php/Publication/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Publication</span> 
												</a>
												<a href="<?= base_url('index.php/PublicationFrequency/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Publication Frequency</span> 
												</a>
												<a href="<?= base_url('index.php/PublicationPlace/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Publication Place</span> 
												</a>
												<a href="<?= base_url('index.php/PublicationType/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Publication Type</span> 
												</a>
												<a href="<?= base_url('index.php/MediaName/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Media Name</span>
												</a>
												<a href="<?= base_url('index.php/ProductCategory/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i>
													<span class="shortcut-label">Product Category</span> 
												</a>
												<a href="<?= base_url('index.php/Product/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i>
													<span class="shortcut-label">Products</span> 
												</a>
											</div>
											<!-- /shortcuts --> 
										</div>
										<!-- /widget-content --> 
									</div>
									<!-- /widget -->
								</div>	<!-- /span9 -->

								<div class="span9">
									<div class="widget">
										<div class="widget-header">
											<i class="icon-list-alt"></i>
											<h3>Page Setup Menu</h3>
										</div>
										<!-- /widget-header -->
										<div class="widget-content">
											<div class="shortcuts">
												<a href="<?= base_url('index.php/Placing/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Placing</span>
												</a>
												<a href="<?= base_url('index.php/PlacingType/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Placing Type</span> 
												</a>
												<a href="<?= base_url('index.php/Page/Index'); ?>" class="shortcut"> 
													<i class="shortcut-icon icon-file"></i>
													<span class="shortcut-label">Page</span> 
												</a>
												<a href="<?= base_url('index.php/Hue/Index'); ?>" class="shortcut"> 
													<i class="shortcut-icon icon-file"></i>
													<span class="shortcut-label">Hue</span> 
												</a>
												<a href="<?= base_url('index.php/Price/Index'); ?>" class="shortcut"> 
													<i class="shortcut-icon icon-file"></i>
													<span class="shortcut-label">Price</span> 
												</a>
											</div>
											<!-- /shortcuts --> 
										</div>
										<!-- /widget-content --> 
									</div>
									<!-- /widget -->
								</div>	<!-- /span9 -->
								
								<div class="span9">
									<div class="widget">
										<div class="widget-header">
											<i class="icon-list-alt"></i>
											<h3>News Setup Menu</h3>
										</div>
										<!-- /widget-header -->
										<div class="widget-content">
											<div class="shortcuts">
												<a href="<?= base_url('index.php/NewsType/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">News Type</span>
												</a>
												<a href="<?= base_url('index.php/NewsCategory/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">News Category</span> 
												</a> 
											</div>
											<!-- /shortcuts --> 
										</div>
										<!-- /widget-content --> 
									</div>
									<!-- /widget -->
								</div>	<!-- /span9 -->
								
								<div class="span9">
									<div class="widget">
										<div class="widget-header">
											<i class="icon-list-alt"></i>
											<h3>Advertise Setup Menu</h3>
										</div>
										<!-- /widget-header -->
										<div class="widget-content">
											<div class="shortcuts">
												<a href="<?= base_url('index.php/Company/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Company</span> 
												</a> 
												<a href="<?= base_url('index.php/Brand/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Brand</span> 
												</a>
												<a href="<?= base_url('index.php/SubBrand/Index'); ?>" class="shortcut"> 
													<i class="shortcut-icon icon-file"></i>
													<span class="shortcut-label">Sub Brand</span> 
												</a>
												<a href="<?= base_url('index.php/Keyword/Index'); ?>" class="shortcut"> 
													<i class="shortcut-icon icon-file"></i>
													<span class="shortcut-label">Keyword</span> 
												</a> 
												<a href="<?= base_url('index.php/AdvertiseCategory/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i> 
													<span class="shortcut-label">Advertise Category</span>
												</a>
												<a href="<?= base_url('index.php/AdvertiseInfo/Index'); ?>" class="shortcut">
													<i class="shortcut-icon icon-file"></i>
													<span class="shortcut-label">Advertise Info</span> 
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
					</div> <!-- /row --> 
				</div>
				<!-- /container --> 
			</div>
			<!-- /main-inner --> 
		</div>
		<!-- /main -->

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
