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
						<form class="form-horizontal" id="sub-brand-form" method="POST" action="<?= base_url('index.php/SubBrand/CreateSubBrand'); ?>">
							<div class="span12">

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-success success-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/SubBrand/SubBrand');?>">&times;</a>
											<strong>Great!</strong> Your Sub Brand Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/SubBrand/SubBrand'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Sub Brand Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/SubBrand/SubBrand'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Sub Brand Already Saved In Data Base...
										</div>
								<?php
									}
								?>
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Advertise Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Sub Brand<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Sub Brand</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">                     
												<label class="control-label" for="compnay"><span class="mendatory">*</span>&nbsp;Company</label>
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
												<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
												<div class="controls">
													<input type="text" class="span10" id="sub-brand-name" name="sub-brand-name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="description">Description</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="sub-brand-description" name="sub-brand-description"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button type="submit" id="button-sub-brand" name="button-sub-brand" class="btn btn-primary" onclick="return Validation()">Create Sub Brand</button>
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

			// Get All Data For Select Menu Script Start
			$(document).on('change', '#company-id', function(){
				var id = $('#company-id').val();
				GetDataForDependantSelectMenu("BrandModel","GetBrandByForeignKey","CompanyId",id,"#brand-select-menu","brand-id","Select Brand",0);
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
				var companyId = $('#company-id').val();
				var brandId = $('#brand-id').val();
				var subBrandName = $('#sub-brand-name').val();

				$('#company-id').css({'border':'1px solid #cccccc'});	
				$('#brand-id').css({'border':'1px solid #cccccc'});					
				$('#sub-brand-name').css({'border':'1px solid #cccccc'});

				if (companyId == 0)
				{
					Message("Oops! Company Can't Be Empty. Please Select Company");
					$('#company-id').css({'border':'1px solid red'});
					return false;
				}

				if (brandId == 0)
				{
					Message("Oops! Brand Can't Be Empty. Please Select Company");
					$('#brand-id').css({'border':'1px solid red'});
					return false;
				}

				if (subBrandName == "")
				{
					Message("Oops! Brand Name Can't Be Empty. Please Enter Brand Name");
					$('#sub-brand-name').css({'border':'1px solid red'});
					return false;
				}
			}
		</script>
	</body>
</html>
