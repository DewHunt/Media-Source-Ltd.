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
									<h3>All Keyword Information</h3>
									<a href="<?= base_url('index.php/Keyword/Keyword'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Keyword</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
									<table id="keyword-data" class="table table-striped table-bordered">
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

									<div id="keyword-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="keyword-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Keyword</h3>
													</div>

													<div class="modal-body">
														<label>Keyword Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="keyword-name" id="keyword-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="keyword-description" id="keyword-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="keyword-id" id="keyword-id" value="">

														<input type="submit" name="update-keyword" id="update-keyword" class="btn btn-success" value="Update">

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

				var dataTable = $('#keyword-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/Keyword/GetKeywordAllInfo'); ?>',
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
					var keywordId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/Keyword/GetKeywordById"); ?>',
						method:'POST',
						data:{keywordId:keywordId},
						dataType:'json',
						success:function(data){
							$('#keyword-modal').modal('show');
							$('#keyword-name').val(data.keywordName);
							$('#keyword-description').val(data.keywordDescription);
							$('#keyword-id').val(data.keywordId);
						}
					});
				});

				$(document).on('submit', '#keyword-form', function(event){
					event.preventDefault();

					var keywordName = $('#keyword-name').val();
					var keywordDescription = $('#keyword-description').val();
					
					$('#keyword-name').css({'border':'1px solid #cccccc'});

					if (keywordName == "")
					{
						alert("Oops! Keyword Name Must Be Filled");
						$('#keyword-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/Keyword/UpdateKeyword"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#keyword-form')[0].reset();
								$('#keyword-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var keywordId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/Keyword/DeleteKeyword'); ?>',
							method:'POST',
							data:{keywordId:keywordId},
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
