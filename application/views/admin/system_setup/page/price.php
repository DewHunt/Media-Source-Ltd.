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
									<h3>All Price Information</h3>
									<a href="<?= base_url('index.php/Price/Price'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Price</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
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

									<div id="price-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="price-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Price</h3>
													</div>

													<div class="modal-body">
														<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Media</label><div id="media-select-menu"></div>
														                     
														<label class="control-label" for="Publication"><span class="mendatory">*</span>&nbsp;Publication</label>

														<div id="publication-select-menu">
															<select class="dropdown" name="publication-select-menu" id="publication-id" style="width: 99%;">
																<option value="">Select Publication</option>
															</select>
														</div>

														<label class="control-label" for="day"><span class="mendatory">*</span>&nbsp;Day</label>
														<div id="day-select-menu"></div>                     
														<label class="control-label" for="publication-place"><span class="mendatory">*</span>&nbsp;Place</label>
														<div id="publication-place-select-menu"></div>
                     
														<label class="control-label" for="price-details"><span class="mendatory">*</span>&nbsp;Price Details</label>

														<table class="table table-striped table-bordered table-responsive">
															<thead>
																<tr>
																	<th>SL</th>
																	<th>Price Title</th>
																	<th>Select Pages</th>
																	<th>Hue</th>
																	<th>Column</th>
																	<th>×</th>
																	<th>Inch</th>
																	<th>Price</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>1</td>
																	<td>
																		<input type="text" class="span2" id="price-title" name="price-title" value="">
																	</td>
																	<td>
																		<div id="page-select-menu"></div>
																	</td>
																	<td>
																		<div id="hue-select-menu"></div>
																	</td>
																	<td>
																		<input type="text" class="span1" id="col" name="col" value="1">
																	</td>
																	<td>×</td>
																	<td>
																		<input type="text" class="span1" id="inch" name="inch" value="1">
																	</td>
																	<td>
																		<input type="text" class="span1" id="price" name="price" value="">
																	</td>
																</tr>
															</tbody>
														</table>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="price-id" id="price-id" value="">

														<input type="submit" name="update-price" id="update-price" class="btn btn-success" value="Update">

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
							'targets':[0, 2, 3, 4, 5, 6, 7],
							'orderable':false
						},
					],
				});

				GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu","media-name-id","Select Media");
				GetDataForSelectMenu("DayModel","GetAllDay","#day-select-menu","day-id","Select Day");
				GetDataForSelectMenu("PageModel","GetAllPage","#page-select-menu","page-id","Select Page Name");
				GetDataForSelectMenu("HueModel","GetAllHue","#hue-select-menu","hue-id","Select Hue");

				// Get All Data For Select Menu Script Start
				$(document).on('change', '#media-name-id', function(){
					var id = $('#media-name-id').val();
					GetDataForDependantSelectMenu("PublicationModel","GetPublicationByForignKey","MediaId",id,"#publication-select-menu","publication-id","Select Publication");
				});

				function GetDataForSelectMenu(modelName,methodName,divId,idNameAttr,selectHeader)
				{
					$.ajax({
						type:'ajax',
						url:'<?php echo base_url('index.php/Price/GetDataForSelectMenu'); ?>',
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
						url:'<?php echo base_url('index.php/Price/GetDataForDependantSelectMenu'); ?>',
						method:'POST',
						data:{modelName:modelName,methodName:methodName,fieldName:fieldName,id:id,idNameAttr:idNameAttr,selectHeader:selectHeader},
						success:function(data){
							$(divId).html(data);
						}
					});
				} 
				// Get All Data For Select Menu Script End

				$(document).on('click', '.update', function(){
					var priceId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/Price/GetPriceById"); ?>',
						method:'POST',
						data:{priceId:priceId},
						dataType:'json',
						success:function(data){
							$('#price-modal').modal('show');
							$('#media-name-id option[value="'+data.mediaId+'"]').prop('selected', true);
							GetDataForDependantSelectMenu("PublicationModel","GetPublicationByForignKey","MediaId",data.mediaId,"#publication-select-menu","publication-id","Select Publication");
							$('#publication-id option[value="'+data.publicationId+'"]').prop('selected', true);
							// $('#publication-select-menu').html(data.publicationId);
							$('#day-id option[value="'+data.dayId+'"]').prop('selected', true);
							$('#price-title').val(data.priceTitle);
							$('#page-id option[value="'+data.pageId+'"]').prop('selected', true);
							$('#hue-id option[value="'+data.hueId+'"]').prop('selected', true);
							$('#col').val(data.col);
							$('#inch').html(data.inch);
							$('#price').html(data.price);
							$('#price-id').val(data.priceId);
						}
					});
				});

				$(document).on('click', '.delete', function(){
					var priceId = $(this).attr('id');

					alert(priceId);
				});
			});
		</script>
	</body>
</html>
