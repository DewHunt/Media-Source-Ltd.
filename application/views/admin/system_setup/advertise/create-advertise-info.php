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
						<form class="form-horizontal" id="adinfo-form" method="POST" action="<?= base_url('index.php/AdvertiseInfo/CreateAdvertiseInfo'); ?>">
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
												<label class="control-label" for="advertise-id"><span class="mendatory">*</span>&nbsp;Advetise Id</label>
												<div class="controls">
													<input type="text" class="span10" id="adinfo-advertise-id" name="adinfo-advertise-id" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">
												<label class="control-label" for="title"><span class="mendatory">*</span>&nbsp;Title</label>
												<div class="controls">
													<input type="text" class="span10" id="adinfo-title" name="adinfo-title" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="company"><span class="mendatory">*</span>&nbsp;Company</label>
												<div class="controls">
													<div id="company-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="brand"><span class="mendatory">*</span>&nbsp;Brand</label>
												<div class="controls">
													<div id="brand-select-menu">
														<select class="dropdown" name="brand-id" id="brand-id" style="width: 99%;">
															<option value="0">Select Brand</option>
														</select>
													</div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="subbrand"><span class="mendatory">*</span>&nbsp;Sub Brand</label>
												<div class="controls">
													<div id="sub-brand-select-menu">
														<select class="dropdown" name="sub-brand-id" id="sub-brand-id" style="width: 99%;">
															<option value="0">Select Sub Brand</option>
														</select>
													</div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="product"><span class="mendatory">*</span>&nbsp;Product</label>
												<div class="controls">
													<div id="product-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="advertise-type"><span class="mendatory">*</span>&nbsp;Advertise Type</label>
												<div class="controls">
													<div id="advertise-type-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="notes">Advertise Notes</label>
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
					url:'<?php echo base_url('index.php/SelectMenu/GetDataForSelectMenu'); ?>',
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
					url:'<?php echo base_url('index.php/SelectMenu/GetDataForDependantSelectMenu'); ?>',
					method:'POST',
					data:{modelName:modelName,methodName:methodName,fieldName:fieldName,id:id,idNameAttr:idNameAttr,selectHeader:selectHeader,selectId:selectId},
					success:function(data){
						$(divId).html(data);
					}
				});
			} 
			// Get All Data For Select Menu Script End

			function Validation()
			{
				var adinfoAdvertiseId = $('#adinfo-advertise-id').val();
				var adinfoTitle = $('#adinfo-title').val();
				var companyId = $('#company-id').val();
				var brandId = $('#brand-id').val();
				var subBrandId = $('#sub-brand-id').val();
				var productId = $('#product-id').val();
				var advertiseTypeId = $('#advertise-type-id').val();

				if (adinfoAdvertiseId == "")
				{
					Message("Oops! Advertise ID Can't Be Empty. Please Select Advertise ID");
					$('#adinfo-advertise-id').focus();
					return false;
				}

				if (adinfoTitle == "")
				{
					Message("Oops! Title Can't Be Empty. Please Select Title");
					$('#adinfo-title').focus();
					return false;
				}

				if (companyId == 0)
				{
					Message("Oops! Company Can't Be Empty. Please Select Company");
					$('#company-id').focus();
					return false;
				}

				if (brandId == 0)
				{
					Message("Oops! Brand Can't Be Empty. Please Select Brand");
					$('#brand-id').focus();
					return false;
				}

				if (subBrandId == 0)
				{
					Message("Oops! Sub Brand Can't Be Empty. Please Select Sub Brand");
					$('#sub-brand-id').focus();
					return false;
				}

				if (productId == 0)
				{
					Message("Oops! Product Can't Be Empty. Please Select Product");
					$('#product-id').focus();
					return false;
				}

				if (advertiseTypeId == 0)
				{
					Message("Oops! Advertise Type Can't Be Empty. Please Select Advertise Type");
					$('#advertise-type-id').focus();
					return false;
				}
			}			
		</script>
	</body>
</html>
