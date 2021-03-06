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
									<h3>All Brand Information</h3>
									<a href="<?= base_url('index.php/Brand/Brand'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Brand</a>

									<?php
										if ($adminInfo->AdminStatus == 101 && $adminInfo->State == 1)
										{
									?>
										<a href="<?= base_url('index.php/Brand/RetrieveBrand'); ?>" type="submit" class="btn btn-danger">Retrieve Brand</a>
									<?php
										}
									?>
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table id="brand-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Company Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Company Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>

									<div id="brand-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="brand-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Brand</h3>
													</div>

													<div class="modal-body">
														<label class="control-label" for="company"><span class="mendatory">*</span>&nbsp;Company</label>
														<div id="company-select-menu"></div>

														<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Brand Name</label>
														<input type="text" id="brand-name" name="brand-name" placeholder="Enter Product Name" style="width: 100%" value="">

														<label class="control-label" for="description">Description</label>
														<textarea rows="3" id="brand-description" name="brand-description" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="brand-id" id="brand-id" value="">

														<input type="submit" name="update-brand" id="update-brand" class="btn btn-success" value="Update">

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

				var dataTable = $('#brand-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url("index.php/Brand/GetBrandAllInfo"); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3, 4],
							'orderable':false
						},
					],
				});
				
				GetDataForSelectMenu("CompanyModel","GetAllCompany","#company-select-menu","company-id","Select Company",0);

				// Get Media Name Data Script Start
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
				// Get Media Name Data Script End

				$(document).on('click', '.update', function(){
					var brandId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/Brand/GetBrandById"); ?>',
						method:'POST',
						data:{brandId:brandId},
						dataType:'json',
						success:function(data){
							$('#brand-modal').modal('show');
							$('#company-id option[value="'+data.companyId+'"]').prop('selected', true);
							$('#brand-name').val(data.brandName);
							$('#brand-description').val(data.brandDescription);
							$('#brand-id').val(data.brandId);
						}
					});
				});

				$(document).on('submit', '#brand-form', function(event){
					event.preventDefault();

					var companyId = $('#company-id').val();
					var brandName = $('#brand-name').val();

					$('#company-id').css({'border':'1px solid #cccccc'});
					$('#brand-name').css({'border':'1px solid #cccccc'});

					if (companyId == 0)
					{
						alert("Oops! Company Can't Be Empty. Please Select Company");
						$('#company-id').css({'border':'1px solid red'});
						return false;
					}
					else if (brandName == "")
					{
						alert("Oops! Brand Name Can't Be Empty. Please Enter Brand Name");
						$('#brand-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/Brand/UpdateBrand"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#brand-form')[0].reset();
								$('#brand-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var brandId = $(this).attr('id');

					if (confirm("Wait! Are You 100% Sure, Really You Want To Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url("index.php/Brand/DeleteBrand"); ?>',
							method:'POST',
							data:{brandId:brandId},
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
