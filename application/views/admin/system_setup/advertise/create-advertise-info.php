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
						<form id="edit-profile" class="form-horizontal">
							<div class="span12">

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-success success-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/AdvertiseInfo/AdvertiseInfo');?>">&times;</a>
											<strong>Great!</strong> Your Advertise Info Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/AdvertiseInfo/AdvertiseInfo'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Advertise Info Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/AdvertiseInfo/AdvertiseInfo'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Advertise Info Already Saved In Data Base...
										</div>
								<?php
									}
								?>
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Advertise Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Advertise Info<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Advertise Info</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">											
												<label class="control-label" for="advertise-id">Advetise Id</label>
												<div class="controls">
													<input type="text" class="span10" id="adinfo-advertise-id" name="adinfo-advertise-id" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="title">Title</label>
												<div class="controls">
													<input type="text" class="span10" id="adinfo-title" name="adinfo-title" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="company">Company</label>
												<div class="controls">
													<div id="company-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="brand">Brand</label>
												<div class="controls">
													<div id="brand-select-menu">
														<select class="dropdown" name="brand-id" id="brand-id" style="width: 99%;">
															<option value="">Select Brand</option>
														</select>
													</div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="subbrand">Sub Brand</label>
												<div class="controls">
													<div id="sub-brand-select-menu">
														<select class="dropdown" name="sub-brand-id" id="sub-brand-id" style="width: 99%;">
															<option value="">Select Sub Brand</option>
														</select>
													</div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="product">Product</label>
												<div class="controls">
													<div id="product-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="advertise-type">Advertise Type</label>
												<div class="controls">
													<div id="advertise-type-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="notes">Notes</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="adinfo-notes" name="adinfo-notes"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="advertise-theme">Advertise Theme</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="advertise-theme" name="advertise-theme"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">									
												<label class="control-label" for="image">Image</label>
												<div class="controls">
													<input type="file" name="adinfo-image" id="adinfo-image">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button type="submit" id="button-adinfo" name="button-adinfo" class="btn btn-primary" onclick="return Validation()">Create Advertise Info</button>
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
			GetDataForSelectMenu("CompanyModel","GetAllCompany","#company-select-menu","company-id","Select Company",0);
			GetDataForSelectMenu("ProductModel","GetAllProduct","#product-select-menu","product-id","Select Product",0);
			GetDataForSelectMenu("AdvertiseCategoryModel","GetAllAdvertiseCategory","#advertise-type-select-menu","advertise-type-id","Select Advertise Type",0);

			// Get All Data For Select Menu Script Start
			$(document).on('change', '#company-id', function(){
				var id = $('#company-id').val();
				GetDataForDependantSelectMenu("BrandModel","GetBrandByForeignKey","CompanyId",id,"#brand-select-menu","brand-id","Select Brand",0);
			});

			$(document).on('change', '#brand-id', function(){
				var id = $('#brand-id').val();
				GetDataForDependantSelectMenu("SubBrandModel","GetSubBrandByForeignKey","BrandId",id,"#sub-brand-select-menu","sub-brand-id","Select Sub Brand",0);
			});

			function GetDataForSelectMenu(modelName,methodName,divId,idNameAttr,selectHeader,selectId)
			{
				$.ajax({
					type:'ajax',
					url:'<?php echo base_url('index.php/AdvertiseInfo/GetDataForSelectMenu'); ?>',
					method:'POST',
					data:{modelName:modelName,methodName:methodName,idNameAttr:idNameAttr,selectHeader:selectHeader,selectId:selectId},
					success:function(data){
						$(divId).html(data);
					}
				});
			} 

			function GetDataForDependantSelectMenu(modelName,methodName,fieldName,id,divId,idNameAttr,selectHeader,selectId)
			{
				$.ajax({
					type:'ajax',
					url:'<?php echo base_url('index.php/AdvertiseInfo/GetDataForDependantSelectMenu'); ?>',
					method:'POST',
					data:{modelName:modelName,methodName:methodName,fieldName:fieldName,id:id,idNameAttr:idNameAttr,selectHeader:selectHeader,selectId:selectId},
					success:function(data){
						$(divId).html(data);
					}
				});
			} 
			// Get All Data For Select Menu Script End			
		</script>
	</body>
</html>
