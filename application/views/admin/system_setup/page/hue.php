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
									<h3>All Hue Information</h3>
									<a href="<?= base_url('index.php/Hue/Hue'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Hue</a> 
								</div>  <!-- /widget-header -->

								<div class="widget-content">
									<table id="hue-data" class="table table-striped table-bordered">
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

									<div id="hue-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="hue-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Hue</h3>
													</div>

													<div class="modal-body">
														<label>Hue Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="hue-name" id="hue-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="hue-description" id="hue-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="hue-id" id="hue-id" value="">

														<input type="submit" name="update-hue" id="update-hue" class="btn btn-success" value="Update">

														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>  <!-- /widget-content --> 
							</div>  <!-- /widget --> 
						</div>  <!-- /span9 -->
					</div> <!-- /row --> 
				</div>  <!-- /container --> 
			</div>  <!-- /main-inner --> 
		</div>  <!-- /main -->

		<?php include APPPATH.'views/admin/master/footer.php'; ?>
		
		<!-- Custom JS File Start -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.has-sub').click(function(){
					$(this).toggleClass('tap');
				});

				var dataTable = $('#hue-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/Hue/GetHueAllInfo'); ?>',
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
					var hueId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/Hue/GetHueById"); ?>',
						method:'POST',
						data:{hueId:hueId},
						dataType:'json',
						success:function(data){
							$('#hue-modal').modal('show');
							$('#hue-name').val(data.hueName);
							$('#hue-description').val(data.hueDescription);
							$('#hue-id').val(data.hueId);
						}
					});
				});

				$(document).on('submit', '#hue-form', function(event){
					event.preventDefault();

					var hueName = $('#hue-name').val();

					if (hueName == "")
					{
						alert("Oops! hue Name Must Be Filled");
						$('#hue-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/Hue/UpdateHue"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#hue-form')[0].reset();
								$('#hue-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var hueId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/Hue/DeleteHue'); ?>',
							method:'POST',
							data:{hueId:hueId},
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
