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
												<th colspan="4" style="text-align: center;">
													<input type="text" name="search-text" id="search-text" placeholder="Search By Media Name" class="span8" value="">
												</th>
											</tr>

											<tr>
												<th colspan="4"><div id="pagination-link"></div></th>
											</tr>
										</thead>
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

				// LoadData();

				// function LoadData(searchText)
				// {					
				// 	$.ajax({
				// 		type:'ajax',
				// 		method:'POST',
				// 		url:'GetMediaNameAllInfo',
				// 		data:{searchText:searchText},
				// 		success:function(data){
				// 			$('#result').html(data);
				// 		}
				// 	});
				// }

				// $('#search-text').keyup(function(){
				// 	var searchText = $('#search-text').val();

				// 	if (searchText == "")
				// 	{
				// 		LoadData();

				// 	}
				// 	else
				// 	{
				// 		LoadData(searchText);
				// 	}
				// });

				LoadData(1);

				function LoadData(page)
				{
					$.ajax({
						url:'GetMediaNameAllInfo/'+page,
						method:'GET',
						dataType:'json',
						success:function(data){
							$('#pagination-link').html(data.paginationLink);
							$('#result').html(data.resultTable);
						}
					});
				}

				$(document).on('click', '.pagination li a', function(event){
					event.preventDefault();
					var page = $(this).data("ci-pagination-page");
					LoadData(page);
				});
			});
		</script>
	</body>
</html>


