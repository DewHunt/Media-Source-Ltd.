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
							<div class="widget widget-table action-table">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>Today's News</h3> 
								</div>  <!-- /widget-header -->

								<div class="widget-content">
									<?php
										if ($show == 1)
										{
									?>
											<table class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>SL</th>
														<th>Date</th>
														<th>News</th>
														<!-- <th>Status</th> -->
													</tr>
												</thead>
												
												<tbody>
									<?php
											$sl = 1;
											foreach ($result as $value)
											{
									?>
													<tr>
														<td><?= $sl; ?></td>
														<td>
															<div class="news-item-date">
															</div>
																<!-- <span class="news-item-day"><?= date('Y-m-d',strtotime($value->EntryDateTime)); ?></span> -->
																<span class="news-item-month"><?= date('Y-m-d',strtotime($value->EntryDateTime)); ?></span>
															</div>
														</td>
														<td>
															<div class="news-item-detail">
																<a href="<?= base_url('index.php/Synopsis/CreateSynopsis/_/'.$value->Id); ?>" class="news-item-title"><?= $value->Title; ?></a>
																<p class="news-item-preview"><?= $value->Content?></p>
															</div>
														</td>
														<!-- <td>Published</td> -->
													</tr>
									<?php
												$sl++;
											}
									?>
												</tbody>
											</table>
									<?php
										}
										elseif ($show == 2)
										{
									?>
											<table class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>SL</th>
														<th>Date</th>
														<th>News</th>
														<!-- <th>Status</th> -->
													</tr>
												</thead>
												
												<tbody>
													<tr><td colspan="3">Data Not Found</td></tr>
												</tbody>
									<?php
										}
									?>
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
		</script>
	</body>
</html>
