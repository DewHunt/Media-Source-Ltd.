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
						<form class="form-horizontal" id="product-form" method="POST" action="<?= base_url('index.php/Product/CreateProduct'); ?>">
							<div class="span12">

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-success success-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/Product/Product');?>">&times;</a>
											<strong>Great!</strong> Your Product Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Product/Product'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Product Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Product/Product'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Product Already Saved In Data Base...
										</div>
								<?php
									}
								?>
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Media Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Products<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Products</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">                    
												<label class="control-label"><span class="mendatory">*</span>&nbsp;Product Category</label>
												<div class="controls">
													<div id="product-category-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
												<div class="controls">
													<input type="text" class="span10" id="product-name" name="product-name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="description">Description</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="product-description" name="product-description"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button type="submit" id="button-product" name="button-product" class="btn btn-primary" onclick="return Validation()">Create Product</button>
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
					url:'<?php echo base_url('index.php/Product/GetDataForSelectMenu'); ?>',
					success:function(data){
						$('#product-category-select-menu').html(data);
					}
				});
			} 
			// Get Media Name Data Script End

			function Validation()
			{
				var productCategoryId = $('#product-category-id').val();
				var productName = $('#product-name').val();

				if (productCategoryId == "")
				{
					Message("Oops! Product Category Can't Be Empty. Please Select Product Category");
					$('#product-category-id').css({'border':'1px solid red'});
					
					$('#product-name').css({'border':'1px solid gray'});
					return false;
				}
				else
				{
					$('#product-category-id').css({'border':'1px solid gray'});
				}

				if (productName == "")
				{
					Message("Oops! Product Name Can't Be Empty. Please Enter Product Name");
					$('#product-name').css({'border':'1px solid red'});

					$('#product-category-id').css({'border':'1px solid gray'});
					return false;
				}
				else
				{
					$('#product-name').css({'border':'1px solid gray'});
				}
			}
		</script>
	</body>
</html>
