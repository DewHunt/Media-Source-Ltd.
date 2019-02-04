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
						<form class="form-horizontal" id="brand-form" method="POST" action="<?= base_url('index.php/Brand/CreateBrand'); ?>">
							<div class="span12">

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-success success-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/Brand/Brand');?>">&times;</a>
											<strong>Great!</strong> Your Brand Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Brand/Brand'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Brand Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Brand/Brand'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Brand Already Saved In Data Base...
										</div>
								<?php
									}
								?>
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Advertise Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Brand<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Brand</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>											
											<div class="control-group">                     
												<label class="control-label" for="company"><span class="mendatory">*</span>&nbsp;Company</label>
												<div class="controls">
													<div id="company-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
												<div class="controls">
													<input type="text" class="span10" id="brand-name" name="brand-name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">
												<label class="control-label" for="description">Description</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="brand-description" name="brand-description"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button type="submit" id="button-brand" name="button-brand" class="btn btn-primary" onclick="return Validation()">Create Brand</button>
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

		<script type="text/javascript">
			GetDataForSelectMenu();

			// Get Media Name Data Script Start
			function GetDataForSelectMenu()
			{
				$.ajax({
					type:'ajax',
					url:'<?php echo base_url('index.php/Brand/GetDataForSelectMenu'); ?>',
					success:function(data){
						$('#company-select-menu').html(data);
					}
				});
			} 
			// Get Media Name Data Script End

			function Validation()
			{
				var companyId = $('#company-id').val();
				var brandName = $('#brand-name').val();

				if (companyId == "")
				{
					Message("Oops! Company Can't Be Empty. Please Select Company");
					$('#company-id').css({'border':'1px solid red'});
					
					$('#brand-name').css({'border':'1px solid gray'});
					return false;
				}
				else
				{
					$('#company-id').css({'border':'1px solid gray'});
				}

				if (brandName == "")
				{
					Message("Oops! Brand Name Can't Be Empty. Please Enter Brand Name");
					$('#brand-name').css({'border':'1px solid red'});

					$('#company-id').css({'border':'1px solid gray'});
					return false;
				}
				else
				{
					$('#brand-name').css({'border':'1px solid gray'});
				}
			}
		</script>
	</body>
</html>