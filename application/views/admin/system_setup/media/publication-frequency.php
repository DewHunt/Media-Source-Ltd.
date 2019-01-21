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
									<h3>All Publication Frequency Information</h3>
									<a href="<?= base_url('index.php/PublicationFrequency/PublicationFrequency'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Publication Frequency</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
									<table id="publication-frequency-data" class="table table-striped table-bordered">
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

									<div id="publication-frequency-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="publication-frequency-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Publication Frequency</h3>
													</div>

													<div class="modal-body">
														<label>Publication Frequency Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="publication-frequency-name" id="publication-frequency-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="publication-frequency-description" id="publication-frequency-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="publication-frequency-id" id="publication-frequency-id" value="">

														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

														<input type="submit" name="update-publication-frequency" id="update-publication-frequency" class="btn btn-success" value="Update">
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

				var dataTable = $('#publication-frequency-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/PublicationFrequency/GetPublicationFrequencyAllInfo'); ?>',
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
					var publicationFrequencyId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/PublicationFrequency/GetPublicationFrequencyById"); ?>',
						method:'POST',
						data:{publicationFrequencyId:publicationFrequencyId},
						dataType:'json',
						success:function(data){
							$('#publication-frequency-modal').modal('show');
							$('#publication-frequency-name').val(data.publicationFrequencyName);
							$('#publication-frequency-description').val(data.publicationFrequencyDescription);
							$('#publication-frequency-id').val(data.publicationFrequencyId);
						}
					});
				});

				$(document).on('submit', '#publication-frequency-form', function(event){
					event.preventDefault();

					var publicationFrequencyName = $('#publication-frequency-name').val();
					var publicationFrequencyDescription = $('#publication-frequency-description').val();

					if (publicationFrequencyName == "")
					{
						alert("Oops! Publication Frequency Name Must Be Filled");
						$('#publication-frequency-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/PublicationFrequency/UpdatePublicationFrequency"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#publication-frequency-form')[0].reset();
								$('#publication-frequency-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var publicationFrequencyId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/PublicationFrequency/DeletePublicationFrequency'); ?>',
							method:'POST',
							data:{publicationFrequencyId:publicationFrequencyId},
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
