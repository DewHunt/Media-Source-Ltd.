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
						<?php include APPPATH.'views/admin/master/system-left-menu.php'?>
						
						<div class="span9">
							<div class="widget">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>All Advertise Info Information</h3>
									<a href="<?= base_url('index.php/AdvertiseInfo/AdvertiseInfo'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Adeverise Info</a> 
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table id="advertise-info-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Title</th>
												<th>Company</th>
												<th>Brand</th>
												<th>Sub Brand</th>
												<th>Product</th>
												<th>Ad Type</th>
												<th>Notes</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Title</th>
												<th>Company</th>
												<th>Brand</th>
												<th>Sub Brand</th>
												<th>Product</th>
												<th>Ad Type</th>
												<th>Notes</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>

									<div id="advertise-info-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="advertise-info-form" enctype="multipart/form-data">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&nbsp;</button>
														<h3 class="modal-title">Update Advertise Info</h3>
													</div>

													<div class="modal-body">
														<label><span class="mendatory">*</span>&nbsp;Advetise Id</label>
														<input type="text" id="adinfo-ad-id" name="adinfo-ad-id" style="width: 100%" value="">
														

														<label><span class="mendatory">*</span>&nbsp;Title</label>
														<input type="text" id="adinfo-title" name="adinfo-title" style="width: 100%" value="">

														<label><span class="mendatory">*</span>&nbsp;Company</label>
														<div id="company-select-menu"></div>

														<label><span class="mendatory">*</span>&nbsp;Brand</label>
														<div id="brand-select-menu">
															<select class="dropdown" name="brand-id" id="brand-id" style="width: 99%;">
																<option value="0">Select Brand</option>
															</select>
														</div>

														<label><span class="mendatory">*</span>&nbsp;Sub Brand</label>
														<div id="sub-brand-select-menu">
															<select class="dropdown" name="sub-brand-id" id="sub-brand-id" style="width: 99%;">
																<option value="0">Select Sub Brand</option>
															</select>
														</div>

														<label><span class="mendatory">*</span>&nbsp;Product</label>
														<div id="product-select-menu"></div>

														<label><span class="mendatory">*</span>&nbsp;Advertise Type</label>
														<div id="advertise-type-select-menu"></div>

														<label><span class="mendatory">*</span>Notes</label>
														<textarea rows="3" id="adinfo-notes" name="adinfo-notes" style="width: 100%"></textarea>

														<label><span class="mendatory">*</span>&nbsp;Advertise Theme</label>
														<textarea rows="3" id="adinfo-theme" name="adinfo-theme" style="width: 100%"></textarea>

														<label>Image</label>
														<input type="file" name="new-adinfo-image" id="new-adinfo-image" class="form-control">

														<label id="uploaded-adinfo-image"></label>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="adinfo-id" id="adinfo-id" value="">

														<input type="submit" name="update-adinfo" id="update-adinfo" class="btn btn-success" value="Update">

														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>	<!-- /widget-content --> 
							</div>	<!-- /widget --> 
						</div>	<!-- /span9 -->
					</div> <!-- /row --> 
				</div>	<!-- /container --> 
			</div>	<!-- /main-inner --> 
		</div>	<!-- /main -->

		<?php include APPPATH.'views/admin/master/footer.php'; ?>
		
		<!-- Custom JS File Start -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.has-sub').click(function(){
					$(this).toggleClass('tap');
				});

				var dataTable = $('#advertise-info-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url("index.php/AdvertiseInfo/GetAdvertiseInfoAllInfo"); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
							'orderable':false
						},
					],
				});

				GetDataForSelectMenu("CompanyModel","GetAllCompany","#company-select-menu","company-id","Select Company",0);

				$(document).on('change', '#company-id', function(){
					var id = $('#company-id').val();
					GetDataForDependantSelectMenu("BrandModel","GetBrandByForeignKey","CompanyId",id,"#brand-select-menu","brand-id","Select Brand",0);
				});

				$(document).on('change', '#brand-id', function(){
					var id = $('#brand-id').val();
					GetDataForDependantSelectMenu("SubBrandModel","GetSubBrandByForeignKey","BrandId",id,"#sub-brand-select-menu","sub-brand-id","Select Sub Brand",0);
				});

				GetDataForSelectMenu("ProductModel","GetAllProduct","#product-select-menu","product-id","Select Product",0);

				GetDataForSelectMenu("AdvertiseCategoryModel","GetAllAdvertiseCategory","#advertise-type-select-menu","advertise-type-id","Select Advertise Type",0);

				// Get All Data For Select Menu Script Start
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

				$(document).on('click', '.update', function(){
					var adinfoId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/AdvertiseInfo/GetAdvertiseInfoById"); ?>',
						method:'POST',
						data:{adinfoId:adinfoId},
						dataType:'json',
						success:function(data){
							$('#adinfo-ad-id').val(data.adinfoADID);
							$('#adinfo-title').val(data.adinfoTitle);
							$('#advertise-info-modal').modal('show');
							$('#company-id option[value="'+data.companyId+'"]').prop('selected', true);

							GetDataForDependantSelectMenu("BrandModel","GetBrandByForeignKey","CompanyId",data.companyId,"#brand-select-menu","brand-id","Select Brand",data.brandId);
							$('#sub-brand-name').val(data.subBrandName);

							GetDataForDependantSelectMenu("SubBrandModel","GetSubBrandByForeignKey","BrandId",data.brandId,"#sub-brand-select-menu","sub-brand-id","Select Brand",data.subBrandId);
							$('#sub-brand-name').val(data.subBrandName);

							$('#product-id option[value="'+data.productId+'"]').prop('selected', true);
							$('#advertise-type-id option[value="'+data.advertiseTypeId+'"]').prop('selected', true);

							$('#adinfo-notes').val(data.adinfoNotes);
							$('#adinfo-theme').val(data.adinfoTheme);
							$('#uploaded-adinfo-image').html(data.adinfoImage);
							$('#adinfo-id').val(data.adinfoId);

							// $('#sub-brand-description').val(data.subBrandDescription);
							// $('#sub-brand-id').val(data.subBrandId);
						}
					});
				});

				$(document).on('submit', '#advertise-info-form', function(event){
					event.preventDefault();
					var adinfoAdvertiseId = $('#adinfo-ad-id').val();
					var adinfoTitle = $('#adinfo-title').val();
					var companyId = $('#company-id').val();
					var brandId = $('#brand-id').val();
					var subBrandId = $('#sub-brand-id').val();
					var productId = $('#product-id').val();
					var advertiseTypeId = $('#advertise-type-id').val();

					$('#adinfo-ad-id').css({'border':'1px solid #cccccc'});
					$('#adinfo-title').css({'border':'1px solid #cccccc'});
					$('#company-id').css({'border':'1px solid #cccccc'});
					$('#brand-id').css({'border':'1px solid #cccccc'});
					$('#sub-brand-id').css({'border':'1px solid #cccccc'});
					$('#product-id').css({'border':'1px solid #cccccc'});
					$('#adinfo-type-id').css({'border':'1px solid #cccccc'});

					if (adinfoAdvertiseId == "")
					{
						alert("Oops! Advertise ID Can't Be Empty. Please Select Advertise ID");
						$('#adinfo-ad-id').css({'border':'1px solid red'});
						return false;
					}
					else if (adinfoTitle == "")
					{
						alert("Oops! Title Can't Be Empty. Please Select Title");
						$('#adinfo-title').css({'border':'1px solid red'});
						return false;
					}
					else if (companyId == 0)
					{
						alert("Oops! Company Can't Be Empty. Please Select Company");
						$('#company-id').css({'border':'1px solid red'});
						return false;
					}
					else if (brandId == 0)
					{
						alert("Oops! Brand Can't Be Empty. Please Select Brand");
						$('#brand-id').css({'border':'1px solid red'});
						return false;
					}
					else if (subBrandId == 0)
					{
						alert("Oops! Sub Brand Can't Be Empty. Please Select Sub Brand");
						$('#sub-brand-id').css({'border':'1px solid red'});
						return false;
					}
					else if (productId == 0)
					{
						alert("Oops! Product Can't Be Empty. Please Select Product");
						$('#product-id').css({'border':'1px solid red'});
						return false;
					}
					else if (advertiseTypeId == 0)
					{
						alert("Oops! Advertise Type Can't Be Empty. Please Select Advertise Type");
						$('#advertise-type-id').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/AdvertiseInfo/UpdateAdvertiseInfo"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#advertise-info-form')[0].reset();
								$('#advertise-info-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});
			});
		</script>
	</body>
</html>
