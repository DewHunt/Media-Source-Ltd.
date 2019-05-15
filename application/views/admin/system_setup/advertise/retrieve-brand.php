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
									<h3>All Brand Information</h3>
									<a href="<?= base_url('index.php/Brand/Index'); ?>" type="submit" class="btn btn-primary">Brand</a> 
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<table id="brand-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Company Name</th>
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
												<th>Company Name</th>
												<th>Description</th>
												<th>Delete By</th>
												<th>Delete Date</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>
								</div>	<!-- /widget-content --> 
							</div>	<!-- /widget --> 
						</div>	<!-- /span12 -->
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

				var dataTable = $('#brand-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url("index.php/Brand/GetDeletedBrandAllInfo"); ?>',
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

				$(document).on('click', '.retrieve', function(){
					var brandId = $(this).attr('id');

					if (confirm("Wait! Are You 100% Sure, Really You Want To Retrieve This?"))
					{
						$.ajax({
							url:'<?php echo base_url("index.php/Brand/RetrieveBrandData"); ?>',
							method:'POST',
							data:{brandId:brandId},
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
