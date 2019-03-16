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
									<h3>All Placing Information</h3>
									<a href="<?= base_url('index.php/Placing/Placing'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Placing</a> 
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table id="placing-data" class="table table-striped table-bordered">
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

									<div id="placing-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="placing-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Placing</h3>
													</div>

													<div class="modal-body">
														<label>Placing Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="placing-name" id="placing-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="placing-description" id="placing-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="placing-id" id="placing-id" value="">

														<input type="submit" name="update-placing" id="update-placing" class="btn btn-success" value="Update">

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

				var dataTable = $('#placing-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/Placing/GetPlacingAllInfo'); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3],
							'orderable':false
						},
					],
				});


				$(document).on('click', '.update', function(){
					var placingId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/Placing/GetPlacingById"); ?>',
						method:'POST',
						data:{placingId:placingId},
						dataType:'json',
						success:function(data){
							$('#placing-modal').modal('show');
							$('#placing-name').val(data.placingName);
							$('#placing-description').val(data.placingDescription);
							$('#placing-id').val(data.placingId);
						}
					});
				});

				$(document).on('submit', '#placing-form', function(event){
					event.preventDefault();

					var placingName = $('#placing-name').val();
					var placingDescription = $('#placing-description').val();

					$('#placing-name').css({'border':'1px solid #cccccc'});

					if (placingName == "")
					{
						alert("Oops! Placing Name Must Be Filled");
						$('#placing-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/Placing/updatePlacing"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#placing-form')[0].reset();
								$('#placing-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var placingId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/Placing/DeletePlacing'); ?>',
							method:'POST',
							data:{placingId:placingId},
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
