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
							<div class="widget widget-table action-table">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>All Advertise Info Information</h3>
									<a href="<?= base_url('index.php/AdvertiseInfo/AdvertiseInfo'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Adeverise Info</a> 
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table id="advertise-info-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Title</th>
												<th>Company</th>
												<th>Brand</th>
												<th>Sub Brand</th>
												<th>Product</th>
												<th>Ad Type</th>
												<th>Notes</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Title</th>
												<th>Company</th>
												<th>Brand</th>
												<th>Sub Brand</th>
												<th>Product</th>
												<th>Ad Type</th>
												<th>Notes</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>

									<div id="media-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="advertise-info-form" enctype="multipart/form-data">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Advertise Info</h3>
													</div>

													<div class="modal-body">
														<label>Advetise Id&nbsp;<span class="mendatory">*</span></label>
														<input type="text" class="span10" id="adinfo-advertise-id" name="adinfo-advertise-id" value="">
														

														<label>Title&nbsp;<span class="mendatory">*</span></label>
														<input type="text" class="span10" id="adinfo-title" name="adinfo-title" value="">

														<label>Company&nbsp;<span class="mendatory">*</span></label>
														<div id="company-select-menu"></div>

														<label>Brand&nbsp;<span class="mendatory">*</span></label>
														<div id="brand-select-menu">
															<select class="dropdown" name="brand-id" id="brand-id" style="width: 99%;">
																<option value="0">Select Brand</option>
															</select>
														</div>

														<label>Sub Brand&nbsp;<span class="mendatory">*</span></label>
														<div id="sub-brand-select-menu">
															<select class="dropdown" name="sub-brand-id" id="sub-brand-id" style="width: 99%;">
																<option value="0">Select Sub Brand</option>
															</select>
														</div>

														<label>Product&nbsp;<span class="mendatory">*</span></label>
														<div id="product-select-menu"></div>

														<label>Advertise Type&nbsp;<span class="mendatory">*</span></label>
														<div id="advertise-type-select-menu"></div>

														<label>Notes&nbsp;<span class="mendatory">*</span></label>
														<textarea class="span10" rows="3" id="adinfo-notes" name="adinfo-notes"></textarea>

														<label>Advertise Theme&nbsp;<span class="mendatory">*</span></label>
														<textarea class="span10" rows="3" id="advertise-theme" name="advertise-theme"></textarea>

														<label>Image</label>
														<input type="file" name="new-media-image" id="new-media-image" class="form-control">

														<label id="uploaded-media-image"></label>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="media-id" id="media-id" value="">

														<input type="submit" name="update-media" id="update-media" class="btn btn-success" value="Update">

														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>	<!-- /widget-content --> 
							</div>	<!-- /widget --> 
						</div>	<!-- /span9 -->
					</div> <!-- /row --> 
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

				var dataTable = $('#advertise-info-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url("index.php/AdvertiseInfo/GetAdvertiseInfoAllInfo"); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
							'orderable':false
						},
					],
				});
			});
		</script>
	</body>
</html>
