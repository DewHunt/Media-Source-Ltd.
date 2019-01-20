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
						<form class="form-horizontal" id="publication-type-form" method="POST" action="<?= base_url('index.php/PublicationType/CreatePublicationType'); ?>">
							<div class="span12">
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Media Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Publication Type<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Publication Type</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">											
												<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
												<div class="controls">
													<input type="text" class="span10" id="publication-type-name" name="publication-type-name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="description">Description</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="publication-type-description" name="publication-type-description"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button type="submit" id="button-publication-type" name="button-publication-type" class="btn btn-primary" onclick="return Validation()">Create Publication Type</button>

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
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/PublicationType/PublicationType');?>">&times;</a>
											<strong>Great!</strong> Your Publication Type Name Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/PublicationType/PublicationType'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Publication Type Name Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/PublicationType/PublicationType'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Publication Type Name Already Saved In Data Base...
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
				var publicationTypeName = $('#publication-type-name').val();
				var publicationTypeDescription = $('#publication-type-description').val();

				if (publicationTypeName == "")
				{
					Message("Oops! Publication Type Name Can't Be Empty. Please Enter Publication Name.");
					$('#publication-type-name').css({'border':'1px solid red'});
					return false;
				}
				else
				{
					$('#publication-type-description').css({'border':'1px solid gray'});
				}
			}
		</script>
	</body>
</html>
