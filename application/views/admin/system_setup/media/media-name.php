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
									<h3>All Media Name Information</h3>
									<a href="<?= base_url('index.php/MediaName/MediaName'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Media Name</a> 
								</div>  <!-- /widget-header -->

								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th colspan="4" style="text-align: center; padding-bottom: 0px;">
													<input type="text" name="search-text" id="search-text" placeholder="Search By Media Name" class="span8" value="">
												</th>
											</tr>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</thead>
										
										<tbody>
											<?php
												$sl = 1;
												if ($mediaInfo == "")
												{
											?>
													<tr><td colspan="4" class="error-message">Oops! Sorry, No Data Found...</td></tr>
											<?php
												}
												else
												{
													foreach ($mediaInfo as $value)
													{
											?>
														<tr>
															<td><?= $sl; ?></td>
															<td><?= $value->Name; ?></td>
															<td><img src="<?= base_url().$value->Image; ?>" width="150px" height="150px"></td>
															<td>
																<a href="<?= base_url('index.php/MediaName/Edit/').$value->Id; ?>" class="btn btn-info">Edit</a>                        
																<a href="<?= base_url('index.php/MediaName/Delete/').$value->Id;?>" class="btn btn-danger">Delete</a>                          
															</td>
														</tr>
											<?php
														$sl++;		
													}
												}
											?>
										</tbody>
									</table>
									<div id="result"></div>
								</div>  <!-- /widget-content --> 
							</div>  <!-- /widget --> 
						</div>   <!-- /span9 -->
					</div>  <!-- /row -->
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

				LoadData();

				function LoadData(searchText)
				{
					// $('#result').html(searchText);
					
					$.ajax({
						type:'ajax',
						method:'POST',
						url:'GetMediaNameAllInfo',
						data:{searchText:searchText},
						success:function(data){
							$('#result').html(data);
						}
					});
				}

				$('#search-text').keyup(function(){
					var searchText = $(this).val();

					if (searchText == "")
					{
						LoadData();
						// $('#result').html('Nothing');

					}
					else
					{
						LoadData(searchText);
						// $('#result').html(searchText);
					}
				});
			});
		</script>
	</body>
</html>
