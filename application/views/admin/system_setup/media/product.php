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
									<h3>All Product Information</h3>
									<a href="<?= base_url('index.php/Product/Product'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Product</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
									<table id="product-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Product</th>
												<th>Category Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Product</th>
												<th>Category Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>

									<div id="product-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="product-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Product</h3>
													</div>

													<div class="modal-body">
														<label class="control-label" for="media"><span class="mendatory">*</span>&nbsp;Product Category</label>
														<div id="product-category-select-menu"></div>

														<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
														<input type="text" id="product-name" name="product-name" placeholder="Enter Product Name" style="width: 100%" value="">

														<label class="control-label" for="description">Description</label>
														<textarea rows="3" id="product-description" name="product-description" style="width: 100%;"></textarea>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="product-id" id="product-id" value="">

														<input type="submit" name="update-product" id="update-product" class="btn btn-success" value="Update">

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

				var dataTable = $('#product-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url("index.php/Product/GetProductAllInfo"); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3, 4],
							'orderable':false
						},
					],
				});
				
				GetDataForSelectMenu("ProductCategoryModel","GetAllProductCategory","#product-category-select-menu","product-category-id","Select Product Category",0);

				// Get Media Name Data Script Start
				function GetDataForSelectMenu(modelName,methodName,divId,idNameAttr,selectHeader,selectId)
				{
					$.ajax({
						type:'ajax',
						url:'<?php echo base_url('index.php/SelectMenu/GetDataForSelectMenu'); ?>',
						method:'POST',
						data:{modelName:modelName,methodName:methodName,idNameAttr:idNameAttr,selectHeader:selectHeader,selectId:selectId},
						success:function(data){
							$(divId).html(data);
						}
					});
				}
				// Get Media Name Data Script End

				$(document).on('click', '.update', function(){
					var productId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/Product/GetProductById"); ?>',
						method:'POST',
						data:{productId:productId},
						dataType:'json',
						success:function(data){
							$('#product-modal').modal('show');
							$('#product-category-id option[value="'+data.productCategoryId+'"]').prop('selected', true);
							$('#product-name').val(data.productName);
							$('#product-description').val(data.productDescription);
							$('#product-id').val(data.productId);
						}
					});
				});

				$(document).on('submit', '#product-form', function(event){
					event.preventDefault();

					var productCategoryId = $('#product-category-id').val();
					var productName = $('#product-name').val();

					if (productCategoryId == "")
					{
						alert("Oops! Product Category Can't Be Empty. Please Select Product Category");
						return false;
					}
					else if (productName == "")
					{
						alert("Oops! Product Name Can't Be Empty. Please Enter Product Name");
						return false;
					}
					else
					{
						$.ajax({
							url:'<?php echo base_url("index.php/Product/UpdateProduct"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#product-form')[0].reset();
								$('#product-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var productId = $(this).attr('id');

					if (confirm("Wait! Are You 100% Sure, Really You Want To Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url("index.php/Product/DeleteProduct"); ?>',
							method:'POST',
							data:{productId:productId},
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
