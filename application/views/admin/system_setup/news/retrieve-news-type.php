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
									<h3>All News Type Information</h3>
									<a href="<?= base_url('index.php/NewsType/Index'); ?>" type="submit" class="btn btn-primary">News Type</a>
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table id="news-type-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Description</th>
												<th>Delete By</th>
												<th>Delete Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Description</th>
												<th>Delete By</th>
												<th>Delete Date</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>

									<div id="news-type-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="news-type-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update News type</h3>
													</div>

													<div class="modal-body">
														<label>News Type Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="news-type-name" id="news-type-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="news-type-description" id="news-type-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="news-type-id" id="news-type-id" value="">

														<input type="submit" name="update-news-type" id="update-news-type" class="btn btn-success" value="Update">

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

				var dataTable = $('#news-type-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/NewsType/GetDeletedNewsTypeAllInfo'); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3, 4, 5],
							'orderable':false
						},
					],
				});

				$(document).on('click', '.retrieve', function(){
					var newsTypeId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Retrieve This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/NewsType/RetrieveNewsTypeData'); ?>',
							method:'POST',
							data:{newsTypeId:newsTypeId},
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
