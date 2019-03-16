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
									<h3>All Advertise Category Information</h3>
									<a href="<?= base_url('index.php/AdvertiseCategory/AdvertiseCategory'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Advertise Category</a> 
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table id="advertise-category-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>

									<div id="advertise-category-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="advertise-category-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Advertise Category</h3>
													</div>

													<div class="modal-body">
														<label>Advertise Category Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="advertise-category-name" id="advertise-category-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="advertise-category-description" id="advertise-category-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="advertise-category-id" id="advertise-category-id" value="">

														<input type="submit" name="update-advertise-category" id="update-advertise-category" class="btn btn-success" value="Update">

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

				var dataTable = $('#advertise-category-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/AdvertiseCategory/GetAdvertiseCategoryAllInfo'); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3],
							'orderable':false
						},
					]
				});

				$(document).on('click', '.update', function(){
					var advertiseCategoryId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/AdvertiseCategory/GetAdvertiseCategoryById"); ?>',
						method:'POST',
						data:{advertiseCategoryId:advertiseCategoryId},
						dataType:'json',
						success:function(data){
							$('#advertise-category-modal').modal('show');
							$('#advertise-category-name').val(data.advertiseCategoryName);
							$('#advertise-category-description').val(data.advertiseCategoryDescription);
							$('#advertise-category-id').val(data.advertiseCategoryId);
						}
					});
				});

				$(document).on('submit', '#advertise-category-form', function(event){
					event.preventDefault();

					var advertiseCategoryName = $('#advertise-category-name').val();
					var advertiseCategoryDescription = $('#advertise-category-description').val();

					$('#advertise-category-name').css({'border':'1px solid #cccccc'});

					if (advertiseCategoryName == "")
					{
						alert("Oops! Advertise Category Name Must Be Filled");
						$('#advertise-category-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/AdvertiseCategory/UpdateAdvertiseCategory"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#advertise-category-form')[0].reset();
								$('#advertise-category-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var advertiseCategoryId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/AdvertiseCategory/DeleteAdvertiseCategory'); ?>',
							method:'POST',
							data:{advertiseCategoryId:advertiseCategoryId},
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
