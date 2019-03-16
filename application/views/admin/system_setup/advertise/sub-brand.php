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
									<h3>All Sub-Brand Information</h3>
									<a href="<?= base_url('index.php/SubBrand/SubBrand'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Sub Brand</a> 
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table id="sub-brand-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Company Name</th>
												<th>Brand Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Company Name</th>
												<th>Brand Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>

									<div id="sub-brand-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="sub-brand-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Publication</h3>
													</div>

													<div class="modal-body">
														<label class="control-label" for="company"><span class="mendatory">*</span>&nbsp;Company</label>
														<div id="company-select-menu"></div>

														<label class="control-label" for="sub-brand"><span class="mendatory">*</span>&nbsp;Brand</label>
														<div id="brand-select-menu">
															<select class="dropdown" name="brand-id" id="brand-id" style="width: 99%;">
																<option value="">Select Brand</option>
															</select>
														</div>

														<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
														<input type="text" id="sub-brand-name" name="sub-brand-name" placeholder="Enter Sub Brand Name" style="width: 100%" value="">

														<label class="control-label" for="description">Description</label>
														<textarea rows="3" id="sub-brand-description" name="sub-brand-description" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="sub-brand-id" id="sub-brand-id" value="">

														<input type="submit" name="update-publication" id="update-publication" class="btn btn-success" value="Update">

														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>	<!-- /widget-content --> 
							</div>	<!-- /widget --> 
						</div>	<!-- /span12 -->
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

				var dataTable = $('#sub-brand-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url("index.php/SubBrand/GetSubBrandAllInfo"); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3, 4, 5],
							'orderable':false
						},
					],
				});

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

				$(document).on('click', '.update', function(){
					var subBrandId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/SubBrand/GetBrandById"); ?>',
						method:'POST',
						data:{subBrandId:subBrandId},
						dataType:'json',
						success:function(data){
							$('#sub-brand-modal').modal('show');
							$('#company-id option[value="'+data.companyId+'"]').prop('selected', true);

							GetDataForDependantSelectMenu("BrandModel","GetBrandByForeignKey","CompanyId",data.companyId,"#brand-select-menu","brand-id","Select Brand",data.brandId);

							$('#sub-brand-name').val(data.subBrandName);
							$('#sub-brand-description').val(data.subBrandDescription);
							$('#sub-brand-id').val(data.subBrandId);
						}
					});
				});

				$(document).on('submit', '#sub-brand-form', function(event){
					event.preventDefault();

					var subBrandId = $('#sub-brand-id').val();
					var subBrandName = $('#sub-brand-name').val();
					var companyId = $('#company-id').val();
					var brandId = $('#brand-id').val();

					$('#company-id').css({'border':'1px solid #cccccc'});	
					$('#brand-id').css({'border':'1px solid #cccccc'});					
					$('#sub-brand-name').css({'border':'1px solid #cccccc'});
					
					if (subBrandName == "")
					{
						alert("Oops! Sub Brand Name Can't Be Empty. Please Enter Sub Brand Name");
						$('#sub-brand-name').css({'border':'1px solid red'});
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
						alert("Oops! Brnad Can't Be Empty. Please Select Brand");	
						$('#brand-id').css({'border':'1px solid red'});
						return false;						
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/SubBrand/UpdateSubBrand"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#sub-brand-form')[0].reset();
								$('#sub-brand-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var subBrandId = $(this).attr('id');

					if (confirm("Wait! Are You 100% Sure, Really You Want To Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url("index.php/SubBrand/DeleteSubBrand"); ?>',
							method:'POST',
							data:{subBrandId:subBrandId},
							success:function(data){
								alert(data);
								dataTable.ajax.reload();
							}
						});						
					}
					else
					{
						return false;
					}
				});
			});
		</script>
	</body>
</html>
