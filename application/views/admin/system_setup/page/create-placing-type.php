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
						<form class="form-horizontal" id="page-type-form" method="POST" action="<?= base_url('index.php/PlacingType/CreatePlacingType'); ?>">
							<div class="span12">

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-success success-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/PlacingType/PlacingType');?>">&times;</a>
											<strong>Great!</strong> Your Placing Type Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/PlacingType/PlacingType'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Placing Type Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/PlacingType/PlacingType'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Placing Type Already Saved In Data Base...
										</div>
								<?php
									}
								?>
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Page Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Placing Type<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Placing Type</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">									
												<label class="control-label" for="name">Name</label>
												<div class="controls">
													<input type="text" class="span10" id="placing-type-name" name="placing-type-name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="description">Description</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="placing-type-description" name="placing-type-description"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button type="submit" id="button-placing-type" name="button-placing-type" class="btn btn-primary" onclick="return Validation()">Create Page Type</button>

												<button type="reset" class="btn btn-danger">Cancel</button>

												<!-- The Toast Message ID -->
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
			function Validation(){
				var placingTypeName = $('#placing-type-name').val();

				if (placingTypeName == "")
				{
					Message("Oops! Placing Type Name Can't Be Empty. Please Enter Page Name.");
					$('#placing-type-name').css({'border':'1px solid red'});
					return false;
				}
			}
		</script>
	</body>
</html>
