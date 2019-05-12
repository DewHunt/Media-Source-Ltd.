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
						<?php //include APPPATH.'views/admin/master/admin-left-menu.php'; ?>
						
						<div class="span12">
							<?php
								if ($message == 1)
								{
							?>
									<div class="alert alert-success success-message">
										<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/Synopsis/ShowSynopsis');?>">&times;</a>
										<strong>Great!</strong> Your Synopsis Saved Successfully...
									</div>
							<?php
								}

								if ($message == 2)
								{
							?>
									<div class="alert alert-info error-message">
										<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Synopsis/ShowSynopsis'); ?>">&times;</a>
										<strong>Oops! Sorry,</strong> Your Synopsis Can't Be Saved...
									</div>
							<?php
								}
							?>
							<div class="widget">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>Today's News</h3> 
								</div>  <!-- /widget-header -->

								<div class="widget-content">
									<table id="editor-synopsis-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Synopsis Title</th>
												<th>Synopsis</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Synopsis Title</th>
												<th>Synopsis</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>
								</div>  <!-- /widget-content --> 
							</div>  <!-- /widget --> 
						</div>   <!-- /span9 -->
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
			});

			var dataTable = $('#editor-synopsis-data').DataTable({
				'processing':true,
				'serverSide':true,
				'order':[],
				'ajax':{
					url:'<?php echo base_url('index.php/Synopsis/GetSynopsisDetailsAllInfo'); ?>',
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
		</script>
	</body>
</html>
