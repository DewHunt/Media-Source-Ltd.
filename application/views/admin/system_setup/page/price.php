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

							<?php
								if ($message == 1)
								{
							?>
									<div class="alert alert-success success-message">
										<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Price/Index'); ?>">&times;</a>
										<strong>Greate!</strong> Your Price Updated...
									</div>
							<?php
								}
							?>
							<div class="widget">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>All Price Information</h3>
									<a href="<?= base_url('index.php/Price/Price'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Price</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
									<table class="table table-striped table-bordered table-responsive">
										<thead>
											<tr>
												<td>Media</td>
												<td>Publication</td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><div id="media-select-menu"></div></td>

												<td>
													<div id="publication-select-menu">
														<select class="dropdown" name="publication-id" id="publication-id" style="width: 99%;">
															<option value="">Select Publication</option>
														</select>
													</div>
												</td>

												<td>
													<div id="price-id-select-menu">
														<select class="dropdown" name="price-id" id="price-id" style="width: 99%;">
															<option value="">Select Price Id</option>
														</select>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<table id="price-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Media</th>
												<th>Publication</th>
												<th>Page</th>
												<th>Hue</th>
												<th>Price</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Media</th>
												<th>Publication</th>
												<th>Page</th>
												<th>Hue</th>
												<th>Price</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>
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

				var priceId = "";

				GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu","media-name-id","Select Media",0);

				// Get All Data For Select Menu Script Start
				$(document).on('change', '#media-name-id', function(){
					var id = $('#media-name-id').val();
					GetDataForDependantSelectMenu("PublicationModel","GetPublicationByForignKey","MediaId",id,"#publication-select-menu","publication-id","Select Publication",0);
				});

				$(document).on('change', '#publication-id', function(){
					var mediaId = $('#media-name-id').val();
					var publicationId = $('#publication-id').val();
					GetDataForDoubleDependantSelectMenu("PriceModel","GetPriceId","MediaId","PublicationId",mediaId,publicationId,"#price-id-select-menu","price-id","Select Price Id",0);
				});

				$(document).on('change', '#price-id', function(){
					var priceId = $('#price-id').val();
				});

				function GetDataForSelectMenu(modelName,methodName,divId,idNameAttr,selectHeader)
				{
					$.ajax({
						type:'ajax',
						url:'<?php echo base_url('index.php/SelectMenu/GetDataForSelectMenu'); ?>',
						method:'POST',
						data:{modelName:modelName,methodName:methodName,idNameAttr:idNameAttr,selectHeader:selectHeader},
						success:function(data){
							$(divId).html(data);
						}
					});
				} 

				function GetDataForDependantSelectMenu(modelName,methodName,fieldName,id,divId,idNameAttr,selectHeader)
				{
					$.ajax({
						type:'ajax',
						url:'<?php echo base_url('index.php/SelectMenu/GetDataForDependantSelectMenu'); ?>',
						method:'POST',
						data:{modelName:modelName,methodName:methodName,fieldName:fieldName,id:id,idNameAttr:idNameAttr,selectHeader:selectHeader},
						success:function(data){
							$(divId).html(data);
						}
					});
				} 

				function GetDataForDoubleDependantSelectMenu(modelName,methodName,fieldName1,fieldName2,id1,id2,divId,idNameAttr,selectHeader)
				{
					$.ajax({
						type:'ajax',
						url:'<?php echo base_url('index.php/SelectMenu/GetDataForDoubleDependantSelectMenu'); ?>',
						method:'POST',
						data:{modelName:modelName,methodName:methodName,fieldName1:fieldName1,fieldName2:fieldName2,id1:id1,id2:id2,idNameAttr:idNameAttr,selectHeader:selectHeader},
						success:function(data){
							// alert(data);
							$(divId).html(data);
						}
					});
				} 
				// Get All Data For Select Menu Script End

				var dataTable = $('#price-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url("index.php/Price/GetPriceAllInfo"); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3, 4, 5, 6, 7],
							'orderable':false
						},
					],
					'search':{
						"search":priceId
					}
				});

				$(document).on('click', '.delete', function(){
					var priceId = $(this).attr('id');

					if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
					{
						$.ajax({
							url:'<?php echo base_url('index.php/Price/DeletePriceDetails'); ?>',
							method:'POST',
							data:{priceId:priceId},
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
