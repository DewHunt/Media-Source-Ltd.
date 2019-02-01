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
									<h3>All Placing Type Information</h3>
									<a href="<?= base_url('index.php/PlacingType/PlacingType'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Placing Type</a> 
								</div>
								<!-- /widget-header -->

								<div class="widget-content">
									<table id="placing-type-data" class="table table-striped table-bordered">
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

									<div id="placing-type-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="placing-type-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Placing type</h3>
													</div>

													<div class="modal-body">
														<label>Placing Type Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="placing-type-name" id="placing-type-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="placing-type-description" id="placing-type-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="placing-type-id" id="placing-type-id" value="">

														<input type="submit" name="update-placing-type" id="update-placing-type" class="btn btn-success" value="Update">

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

				var dataTable = $('#placing-type-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/PlacingType/GetPlacingTypeAllInfo'); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 2, 3],
							'orderable':false
						},
					],
				});

				$(document).on('click', '.update', function(){
					var placingTypeId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/PlacingType/GetPlacingTypeById"); ?>',
						method:'POST',
						data:{placingTypeId:placingTypeId},
						dataType:'json',
						success:function(data){
							$('#placing-type-modal').modal('show');
							$('#placing-type-name').val(data.placingTypeName);
							$('#placing-type-description').val(data.placingTypeDescription);
							$('#placing-type-id').val(data.placingTypeId);
						}
					});
				});

				$(document).on('submit', '#placing-type-form', function(event){
					event.preventDefault();

					var placingTypeName = $('#placing-type-name').val();
					var placingTypeDescription = $('#placing-type-description').val();

					if (placingTypeName == "")
					{
						alert("Oops! Placing Type Name Must Be Filled");
						$('#placing-type-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/PlacingType/UpdatePlacingType"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#placing-type-form')[0].reset();
								$('#placing-type-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var placingTypeId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/PlacingType/DeletePlacingType'); ?>',
							method:'POST',
							data:{placingTypeId:placingTypeId},
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
