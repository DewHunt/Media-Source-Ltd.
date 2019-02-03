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
						<form class="form-horizontal" id="product-category-form" method="POST" action="<?= base_url('index.php/ProductCategory/CreateProductCategory'); ?>">
							<div class="span12">

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-success success-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/ProductCategory/ProductCategory');?>">&times;</a>
											<strong>Great!</strong> Your Product Category Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/ProductCategory/ProductCategory'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Product Category Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/ProductCategory/ProductCategory'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Product Category Already Saved In Data Base...
										</div>
								<?php
									}
								?>
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Media Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Product Category<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Product Category</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>											
											<div class="control-group">										
												<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
												<div class="controls">
													<input type="text" class="span10" id="product-category-name" name="product-category-name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="description">Description</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="product-category-description" name="product-category-description"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button type="submit" id="button-product-category" name="button-product-category" class="btn btn-primary" onclick="return Validation()">Create Product Category</button>

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
			function Validation()
			{
				var productCategoryName = $('#product-category-name').val();

				if (productCategoryName == "")
				{
					Message("Oops! Product Category Name Can't Be Empty. Please Enter Product Category Name.");
					$('#product-category-name').css({'border':'1px solid red'});
					return false;
				}
				else
				{
					$('#product-category-name').css({'border':'1px solid gray'});
				}
			}
		</script>
	</body>
</html>
