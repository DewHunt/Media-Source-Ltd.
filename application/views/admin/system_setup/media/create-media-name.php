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
						<form class="form-horizontal" id="media-name-form" method="POST" action="<?= base_url('index.php/MediaName/CreateMediaName'); ?>" enctype="multipart/form-data">
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
												<button type="submit" id="button-media-name" name="button-media-name" class="btn btn-primary" onclick="return Validation()">Create Media Name</button>
												<button type="reset" class="btn btn-danger">Cancel</button>

												<!-- The Toast Message ID -->
												<p id="message"></p>
											</div> <!-- /form-actions -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
								<!-- /widget -->

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-success success-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/MediaName/MediaName');?>">&times;</a>
											<strong>Great!</strong> Your Media Name Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/MediaName/MediaName'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Media Name Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/MediaName/MediaName'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Meida Name Already Saved In Data Base...
										</div>
								<?php
									}
								?>
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
			function Validation(){
				var mediaName = $('#media-name').val();

				if (mediaName == "")
				{
					Message("Oops! Media Name Can't Be Empty. Please Enter Media Name.");
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
