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
											<?php
												foreach ($synopsisInfo as $value)
												{
													$dataEntryReportInfo = $this->SynopsisModel->DataEntryReportInfoById($value->DataEntryReportId);
											?>
												<li>
													<a data-gallery="jquery" data-caption="<?= $dataEntryReportInfo->Caption; ?>" data-group="a" href="<?= base_url('images/nss-prothomalo-sports-00.png'); ?>"><?= $dataEntryReportInfo->MediaId; ?></a>
												</li>
											<?php
												}
											?>
										</ul>
									</div>  <!-- /main-nav -->
								</div>  <!-- /widget-content -->
							</div>  <!-- /widget -->
						</div>  <!-- /span3 -->

						<form id="synopsis-details-form" class="form-horizontal" method="POST" action="<?= base_url('index.php/Synopsis/CreateSynopsisAction'); ?>">
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
													<input type="text" class="span7" id="operator-synopsis-title" name="operator-synopsis-title" readonly="readonly" value="<?= $synopsisByOperatorInfo->Title; ?>">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="synopsis-title">Synopsis Title</label>
												<div class="controls">
													<input type="text" class="span7" id="editor-synopsis-title" name="editor-synopsis-title" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">
												<label class="control-label" for="synopsis">Synopsis</label>
												<div class="controls">
													<textarea class="span7" rows="10" id="editor-synopsis" name="editor-synopsis"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->

<!-- 											<div class="control-group">
												<label class="control-label" for="service">Media Name</label>												
												<div class="controls">
												<?php
													foreach ($synopsisInfo as $value)
													{
														$dataEntryReportInfo = $this->SynopsisModel->DataEntryReportInfoById($value->DataEntryReportId);
												?>
														<label class="checkbox inline">
															<input type="checkbox" name="prothom-alo"><?= $dataEntryReportInfo->MediaId; ?>
														</label>	
												<?php
													}
												?>
												</div>	
											</div> -->
											
											<div class="form-actions">
												<input type="text" id="synopsis-by-operator-id" name="synopsis-by-operator-id" value="<?= $synopsisByOperatorInfo->Id; ?>">
												<button type="submit" id="save-synopsis" name="save-synopsis" class="btn btn-primary">Save Synopsis</button> 
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
