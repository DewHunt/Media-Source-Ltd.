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
									<h3>All News Category Information</h3>
									<a href="<?= base_url('index.php/NewsCategory/NewsCategory'); ?>" type="submit" class="btn btn-primary" target="_blank">Create News Category</a> 
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table id="news-category-data" class="table table-striped table-bordered">
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

									<div id="news-category-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="news-category-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update News Category</h3>
													</div>

													<div class="modal-body">
														<label>New Category Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="news-category-name" id="news-category-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="news-category-description" id="news-category-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="news-category-id" id="news-category-id" value="">

														<input type="submit" name="update-news-category" id="update-news-category" class="btn btn-success" value="Update">

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

				var dataTable = $('#news-category-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/NewsCategory/GetNewsCategoryAllInfo'); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3],
							'orderable':false
						},
					]
				});

				$(document).on('click', '.update', function(){
					var newsCategoryId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/NewsCategory/GetNewsCategoryById"); ?>',
						method:'POST',
						data:{newsCategoryId:newsCategoryId},
						dataType:'json',
						success:function(data){
							$('#news-category-modal').modal('show');
							$('#news-category-name').val(data.newsCategoryName);
							$('#news-category-description').val(data.newsCategoryDescription);
							$('#news-category-id').val(data.newsCategoryId);
						}
					});
				});

				$(document).on('submit', '#news-category-form', function(event){
					event.preventDefault();

					var newsCategoryName = $('#news-category-name').val();
					var newsCategoryDescription = $('#news-category-description').val();

					$('#news-category-name').css({'border':'1px solid #cccccc'});

					if (newsCategoryName == "")
					{
						alert("Oops! News Category Name Must Be Filled");
						$('#news-category-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/NewsCategory/UpdateNewsCategory"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#news-category-form')[0].reset();
								$('#news-category-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var newsCategoryId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/NewsCategory/DeleteNewsCategory'); ?>',
							method:'POST',
							data:{newsCategoryId:newsCategoryId},
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
