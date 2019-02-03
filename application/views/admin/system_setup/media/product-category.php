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
									<h3>All Product Category Information</h3>
									<a href="<?= base_url('index.php/ProductCategory/ProductCategory'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Product Category</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
									<table id="product-category-data" class="table table-striped table-bordered">
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

									<div id="product-category-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="product-category-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Product Category</h3>
													</div>

													<div class="modal-body">
														<label>Product Category Name&nbsp;<span class="mendatory">*</span></label>
														<input type="text" name="product-category-name" id="product-category-name" class="form-control" style="width: 100%;">

														<label>Description</label>
														<textarea rows="3" name="product-category-description" id="product-category-description" class="form-control" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="product-category-id" id="product-category-id" value="">

														<input type="submit" name="update-product-category" id="update-product-category" class="btn btn-success" value="Update">

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

				var dataTable = $('#product-category-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url('index.php/ProductCategory/GetProductCategoryAllInfo'); ?>',
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
					var productCategoryId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/ProductCategory/GetProductCategoryById"); ?>',
						method:'POST',
						data:{productCategoryId:productCategoryId},
						dataType:'json',
						success:function(data){
							$('#product-category-modal').modal('show');
							$('#product-category-name').val(data.productCategoryName);
							$('#product-category-description').val(data.productCategoryDescription);
							$('#product-category-id').val(data.productCategoryId);
						}
					});
				});

				$(document).on('submit', '#product-category-form', function(event){
					event.preventDefault();

					var productCategoryName = $('#product-category-name').val();
					var productCategoryDescription = $('#product-category-description').val();

					if (productCategoryName == "")
					{
						alert("Oops! Product Category Name Must Be Filled");
						$('#product-category-name').css({'border':'1px solid red'});
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/ProductCategory/UpdateProductCategory"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#product-category-form')[0].reset();
								$('#product-category-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var productCategoryId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/ProductCategory/DeleteProductCategory'); ?>',
							method:'POST',
							data:{productCategoryId:productCategoryId},
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
