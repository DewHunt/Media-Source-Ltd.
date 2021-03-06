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
						<form class="form-horizontal" id="media-name-form" method="POST" action="<?= base_url('index.php/MediaName/CreateMediaName')?>" enctype="multipart/form-data">
							<div class="span12">
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Media Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Media Name<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Media Name</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="name"><sapn class="mendatory">*</sapn>&nbsp;Name</label>
												<div class="controls">
													<input type="text" class="span10" id="media-name" name="media-name" placeholder="Enter Media Name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">                   
												<label class="control-label" for="image">Image</label>
												<div class="controls">
													<input type="file" name="media-image" id="media-image">
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button type="submit" id="button-media-name" name="button-media-name" class="btn btn-primary" onclick="return validation()">Create Media Name</button>
												<button type="reset" class="btn btn-danger">Cancel</button>
												
												<?php
													if ($message == 1)
													{
												?>
														<span class="success-message">Great! Your Media Name Created Successfully...</span>
												<?php
													}
													
													if ($message == 2)
													{
												?>
														<span class="error-message">Oops! Sorry, Your Media Name Cannot Created...</span>
												<?php
													}
												?>
												<!-- The actual message -->
												<p id="message"></p>
											</div> <!-- /form-actions -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
								<!-- /widget --> 
							</div>
							<!-- /span12 -->
						</form> 
					</div>
					<!-- /row -->
				</div>
				<!-- /container --> 
			</div>
			<!-- /main-inner --> 
		</div>
		<!-- /main -->
		<?php include APPPATH.'views/admin/master/footer.php'; ?>
		
		<!-- Custome JS File Include -->
		<script type="text/javascript">
			function validation(){
				var mediaName = $('#media-name').val();

				if (mediaName == "")
				{
					Message("Please Enter Media Name!");
					$('#media-name').css({'border':'1px solid red'});
					return false;
				}
				else
				{
					$('#media-name').css({'border':'1px solid gray'});						
				}
			}
		</script>
	</body>
</html>
