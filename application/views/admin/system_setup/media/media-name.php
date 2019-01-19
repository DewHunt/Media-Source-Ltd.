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
									<h3>All Media Name Information</h3>
									<a href="<?= base_url('index.php/MediaName/MediaName'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Media Name</a> 
								</div>  <!-- /widget-header -->

								<div class="widget-content">
									<table id="media-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>

									<div id="media-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="media-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Media Name</h3>
													</div>

													<div class="modal-body">
														<label>Media Name</label>
														<input type="text" name="media-name" id="media-name" class="form-control" style="width: 100%;">

														<label>Image</label>
														<input type="file" name="new-media-image" id="new-media-image" class="form-control">

														<label id="uploaded-media-image"></label>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="media-id" id="media-id" value="">

														<input type="hidden" name="previous-media-image" id="previous-media-image" value="">

														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

														<input type="submit" name="update-media" id="update-media" class="btn btn-success" value="Update">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>  <!-- /widget-content --> 
							</div>  <!-- /widget --> 
						</div>   <!-- /span9 -->
					</div>  <!-- /row -->
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

				var dataTable = $('#media-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url("index.php/MediaName/GetMediaNameAllInfo"); ?>',
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
					var mediaId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/MediaName/GetMediaNameById"); ?>',
						method:'POST',
						data:{mediaId:mediaId},
						dataType:'json',
						success:function(data){
							$('#media-modal').modal('show');
							$('#media-name').val(data.mediaName);
							$('#uploaded-media-image').html(data.mediaImage);
							$('#previous-media-image').val(data.previousMediaImage);
							$('#media-id').val(data.mediaId);
						}
					});
				});

				$(document).on('submit', '#media-form', function(event){
					event.preventDefault();
					var mediaName = $('#media-name').val();
					var extention = $('#new-media-image').val().split('.').pop().toLowerCase();

					if (extention != "")
					{
						if (jQuery.inArray(extention, ['gif', 'png', 'jpg', 'jpeg']) == -1)
						{
							alert('Oops! Invalid Image File.');
							$('#new-media-image').val('');
							return false;
						}
					}

					if (mediaName == "")
					{
						alert('Oops! Media Name Must Be Filled');
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/MediaName/UpdateMediaName"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#media-form')[0].reset();
								$('#media-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var mediaId = $(this).attr('id');

					if (confirm("Wait! Are You 100% Sure, You Want To Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url("index.php/MediaName/DeleteMediaName"); ?>',
							method:'POST',
							data:{mediaId:mediaId},
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


