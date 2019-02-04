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
									<h3>All Company Information</h3>
									<a href="<?= base_url('index.php/Company/Company'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Company</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
									<table id="company-data" class="table table-striped table-bordered">
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

									<div id="company-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="company-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Company</h3>
													</div>

													<div class="modal-body">
														<label>Company Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="company-name" id="company-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="company-description" id="company-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="company-id" id="company-id" value="">

														<input type="submit" name="update-company" id="update-company" class="btn btn-success" value="Update">

														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>  <!-- /widget-content --> 
							</div>  <!-- /widget --> 
						</div>  <!-- /span12 -->
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

				var dataTable = $('#company-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/Company/GetCompanyAllInfo'); ?>',
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
					var companyId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/Company/GetCompanyById"); ?>',
						method:'POST',
						data:{companyId:companyId},
						dataType:'json',
						success:function(data){
							$('#company-modal').modal('show');
							$('#company-name').val(data.companyName);
							$('#company-description').val(data.companyDescription);
							$('#company-id').val(data.companyId);
						}
					});
				});

				$(document).on('submit', '#company-form', function(event){
					event.preventDefault();

					var companyName = $('#company-name').val();
					var companyDescription = $('#company-description').val();

					if (companyName == "")
					{
						alert("Oops! Company Name Must Be Filled");
						$('#company-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/Company/updateCompany"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#company-form')[0].reset();
								$('#company-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var companyId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/Company/DeleteCompany'); ?>',
							method:'POST',
							data:{companyId:companyId},
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
