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
									<h3>All Publication Place Information</h3>
									<a href="<?= base_url('index.php/PublicationPlace/PublicationPlace'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Publication Place</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
									<table id="publication-place-data" class="table table-striped table-bordered">
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

									<div id="publication-place-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="publication-place-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Publication Place</h3>
													</div>

													<div class="modal-body">
														<label>Publication Place Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="publication-place-name" id="publication-place-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="publication-place-description" id="publication-place-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="publication-place-id" id="publication-place-id" value="">

														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

														<input type="submit" name="update-publication-place" id="update-publication-place" class="btn btn-success" value="Update">
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

				var dataTable = $('#publication-place-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/PublicationPlace/GetPublicationPlaceAllInfo'); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 2, 3],
							'orderable':false
						},
					]
				});

				$(document).on('click', '.update', function(){
					var publicationPlaceId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/PublicationPlace/GetPublicationPlaceById"); ?>',
						method:'POST',
						data:{publicationPlaceId:publicationPlaceId},
						dataType:'json',
						success:function(data){
							$('#publication-place-modal').modal('show');
							$('#publication-place-name').val(data.publicationPlaceName);
							$('#publication-place-description').val(data.publicationPlaceDescription);
							$('#publication-place-id').val(data.publicationPlaceId);
						}
					});
				});

				$(document).on('submit', '#publication-place-form', function(event){
					event.preventDefault();

					var publicationPlaceName = $('#publication-place-name').val();
					var publicationPlaceDescription = $('#publication-place-description').val();

					if (publicationPlaceName == "")
					{
						alert("Oops! Publication Place Name Must Be Filled");
						$('#publication-place-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/PublicationPlace/UpdatePublicationPlace"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#publication-place-form')[0].reset();
								$('#publication-place-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var publicationPlaceId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/PublicationPlace/DeletePublicationPlace'); ?>',
							method:'POST',
							data:{publicationPlaceId:publicationPlaceId},
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
