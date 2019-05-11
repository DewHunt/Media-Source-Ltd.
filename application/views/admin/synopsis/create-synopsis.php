<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include APPPATH.'views/admin/master/header.php'; ?>
	</head>
	
	<body>
		<?php include APPPATH.'views/admin/master/navbar.php'; ?>

		<?php include APPPATH.'views/admin/master/admin-sub-navbar.php'; ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<div class="span3">
							<div class="widget">
								<div class="widget-header">
									<i class="icon-list-alt"></i>
									<h3>Related All News</h3>
								</div>  <!-- /widget -->
								<div class="widget-content">
									<div class="left-main-nav">
										<ul class="left-main-nav-ul">
											<li>
												<a data-gallery="jquery" data-caption="<?= $dataEntryReportInfo->Caption; ?>" data-group="a" href="<?= base_url('images/nss-prothomalo-sports-00.png'); ?>">Prothom Alo</a>
											</li>
											
											<li><a data-gallery="jquery" data-caption="২১৮ রানে জয় বাংলাদেশের" data-group="a" href="<?= base_url('images/nss-prothomalo-sports-00.png'); ?>">Prothom Alo</a></li>
											<li><a data-gallery="jquery" data-caption="জিম্বাবুয়ের বিপক্ষে ২১৮ রানের বড় জয় বাংলাদেশের" data-group="a" href="<?= base_url('images/nss-bd-pratidin-sports-00.png'); ?>">Bangladesh Partidin</a></li>
											<li><a data-gallery="jquery" data-caption="" data-group="a" href="">Amader Somoy</a></li>
											<li><a data-gallery="jquery" data-caption="" data-group="a" href="">Somokal</a></li>
										</ul>
									</div>  <!-- /main-nav -->
								</div>  <!-- /widget-content -->
							</div>  <!-- /widget -->
						</div>  <!-- /span3 -->

						<form id="edit-profile" class="form-horizontal">
							<div class="span9">
								<div class="widget">
									<div class="widget-header">
										<i class="icon-list"></i>
										<h3>Write Synopsis</h3>
									</div>	<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">									
												<label class="control-label" for="synopsis-title">News Caption</label>
												<div class="controls">
													<input type="text" class="span7" id="synopsis-title" readonly value="<?= $synopsisByOperatorInfo->Title; ?>">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->

											<div class="control-group">									
												<label class="control-label" for="synopsis-title">Synopsis Title</label>
												<div class="controls">
													<input type="text" class="span7" id="synopsis-title" name="synopsis-title" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="synopsis">Synopsis</label>
												<div class="controls">
													<textarea class="span7" rows="10" id="synopsis" name="synopsis"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->

											<div class="control-group">									
												<label class="control-label" for="service">Media Name</label>
												
												<div class="controls">
													<label class="checkbox inline">
														<input type="checkbox" name="prothom-alo">Prothom Alo
													</label>
													
													<label class="checkbox inline">
														<input type="checkbox" name="bangladesh-partidin">Bangladesh Partidin
													</label>
													
													<label class="checkbox inline">
														<input type="checkbox" name="amader-somoy">mader Somoy
													</label>
													
													<label class="checkbox inline">
														<input type="checkbox" name="somokal">Somokal
													</label>
												</div>		<!-- /controls -->		
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<a href="#" type="submit" class="btn btn-primary">Save Synopsis</a> 
												<button class="btn">Cancel</button>
											</div> <!-- /form-actions -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
							</div>	<!-- /span9 -->
						</form> <!-- /form -->
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
			
			// jQuery plugin For Image Viewer
			$('[data-gallery=jquery]').photoviewer();
		</script>
	</body>
</html>
