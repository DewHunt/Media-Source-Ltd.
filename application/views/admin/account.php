<!DOCTYPE html>
<html lang="en">
	<head>		
		<?php include APPPATH.'views/admin/master/header.php'; ?>
	</head>
	
	<body>
		<?php include APPPATH.'views/admin/master/navbar.php'; ?>

		<?php include APPPATH.'views/admin/master/admin-sub-navbar.php'; ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<?php include APPPATH.'views/admin/master/admin-left-menu.php'; ?>

						<div class="span9">							
							<div class="widget">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>Accounts Information</h3>
									<a href="<?= base_url('index.php/Account/Account'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Account</a> 

									<?php
										if ($adminInfo->AdminStatus == 101 && $adminInfo->State == 1)
										{
									?>
										<a href="<?= base_url('index.php/Account/RetrieveAccount'); ?>" type="submit" class="btn btn-danger">Retrieve Account</a>
									<?php
										}
									?>
								</div>	<!-- /widget-header -->

								<div class="widget-content">
									<table id="account-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>User Id</th>
												<th>Accounts Types</th>
												<th>Mobile</th>
												<th>email</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>User Id</th>
												<th>Accounts Types</th>
												<th>Mobile</th>
												<th>email</th>
												<th>Actions</th>
											</tr>
										</tfoot>
									</table>

									<div id="account-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="account-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Acount</h3>
													</div>

													<div class="modal-body">
														<label>Account Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="account-name" id="account-name" class="form-control" style="width: 100%;">

														<label>Mobile&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="account-mobile" id="account-mobile" class="form-control" style="width: 100%;">

														<label>Email</label>
														<input type="email" name="account-email" id="account-email" class="form-control" style="width: 100%;">

														<label>User Id&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="account-user-id" id="account-user-id" class="form-control" style="width: 100%;">

														<label>Account Type&nbsp;<span class="mendatory">*</span></label>
														<select class="dropdown" name="account-type" id="account-type" style="width: 100%;">
															<option value="">Select An Accounts Type</option>
															<option value="Admin">Admin</option>
															<option value="Editor">Editor</option>
															<option value="Operator">Operator</option>
														</select>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="account-id" id="account-id" value="">

														<input type="submit" name="update-account" id="update-account" class="btn btn-success" value="Update">

														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>	<!-- /widget-content --> 
							</div>	<!-- /widget -->
						</div>	<!-- /span12 --> 
					</div>	<!-- /row --> 
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

				var dataTable = $('#account-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/Account/GetAccountAllInfo'); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3, 4, 5, 6],
							'orderable':false
						},
					],
				});


				$(document).on('click', '.update', function(){
					var accountId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/Account/GetAccountById"); ?>',
						method:'POST',
						data:{accountId:accountId},
						dataType:'json',
						success:function(data){
							$('#account-modal').modal('show');
							$('#account-name').val(data.accountName);
							$('#account-mobile').val(data.accountPhone);
							$('#account-email').val(data.accountEmail);
							$('#account-user-id').val(data.accountUserId);
							$('#account-type').val(data.accountDesignationId);
							$('#account-id').val(data.accountId);
						}
					});
				});

				$(document).on('submit', '#account-form', function(event){
					event.preventDefault();

					var accountName = $('#account-name').val();
					var accountPhone = $('#account-mobile').val();
					var accountUserId = $('#account-user-id').val();
					var accountType = $('#account-type').val();

					$('#account-name').css({'border':'1px solid #cccccc'});
					$('#account-mobile').css({'border':'1px solid #cccccc'});
					$('#account-user-id').css({'border':'1px solid #cccccc'});
					$('#account-type').css({'border':'1px solid #cccccc'});

					if (accountName == "")
					{
						alert("Oops! Company Name Must Be Filled");
						$('#company-name').css({'border':'1px solid red'});
						return false;
					}
					else if (accountPhone == "")
					{
						alert("Oops! Account Phone Must Be Filled");
						$('#account-mobile').css({'border':'1px solid red'});
						return false;						
					}
					else if (accountUserId == "")
					{
						alert("Oops! Account Use Id Must Be Filled");
						$('#account-user-id').css({'border':'1px solid red'});
						return false;
					}
					else if (accountType == "")
					{
						alert("Oops! Account Type Must Be Selected");
						$('#account-type').css({'border':'1px solid red'});
						return false;						
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/Account/UpdateAccount"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#account-form')[0].reset();
								$('#account-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var accountId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/Account/DeleteAccount'); ?>',
							method:'POST',
							data:{accountId:accountId},
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
