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
									<h3>All Page Information</h3>
									<a href="<?= base_url('index.php/Page/Page'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Page</a> 
								</div>  <!-- /widget-header -->

								<div class="widget-content">
									<table id="page-data" class="table table-striped table-bordered">
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

									<div id="page-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="page-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Page</h3>
													</div>

													<div class="modal-body">
														<label>Page Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="page-name" id="page-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="page-description" id="page-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="page-id" id="page-id" value="">

														<input type="submit" name="update-page" id="update-page" class="btn btn-success" value="Update">

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

				var dataTable = $('#page-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/Page/GetPageAllInfo'); ?>',
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
					var publicationTypeId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/PublicationType/GetPublicationTypeById"); ?>',
						method:'POST',
						data:{publicationTypeId:publicationTypeId},
						dataType:'json',
						success:function(data){
							$('#publication-type-modal').modal('show');
							$('#publication-type-name').val(data.publicationTypeName);
							$('#publication-type-description').val(data.publicationTypeDescription);
							$('#publication-type-id').val(data.publicationTypeId);
						}
					});
				});

				$(document).on('submit', '#publication-type-form', function(event){
					event.preventDefault();

					var publicationTypeName = $('#publication-type-name').val();
					var publicationTypeDescription = $('#publication-type-description').val();

					if (publicationTypeName == "")
					{
						alert("Oops! Publication Type Name Must Be Filled");
						$('#publication-type-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/PublicationType/UpdatePublicationType"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#publication-type-form')[0].reset();
								$('#publication-type-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var publicationTypeId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/PublicationType/DeletePublicationType'); ?>',
							method:'POST',
							data:{publicationTypeId:publicationTypeId},
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
