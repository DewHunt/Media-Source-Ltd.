<!DOCTYPE html>
<html lang="en">
	<head>		
		<?php include APPPATH.'/views/admin/master/header.php'; ?>
	</head>
	
	<body>
		<?php include APPPATH.'views/admin/master/navbar.php'; ?>

		<?php include APPPATH.'views/admin/master/admin-sub-navbar.php'; ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<?php include APPPATH.'views/admin/master/admin-left-menu.php'; ?>

						<div class="span9">							
							<div class="widget widget-table action-table">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>Accounts Information</h3>
									<a href="<?= base_url('index.php/Account/Account'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Account</a> 
								</div>	<!-- /widget-header -->

								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Name</th>
												<th>User Id</th>
												<th>Accounts Types</th>
												<th>Mobile</th>
												<th>email</th>
												<th class="td-actions">Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Dew Hunt</td>
												<td>dew_hunt</td>
												<td>Editor</td>
												<td>+88 017 66 328 322</td>
												<td>dew@gmail.com</td>
												<td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
											</tr>
											<tr>
												<td>Salman Sabbir</td>
												<td>salman_110</td>
												<td>Operator</td>
												<td>+88 016 11 101 101</td>
												<td>salman@yahoo.com</td>
												<td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
											</tr>
											<tr>
												<td>Sadnan Saeb</td>
												<td>sadnan_101</td>
												<td>Operator</td>
												<td>+88 019 11 101 101</td>
												<td>sadnan@hotmail.com</td>
												<td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
											</tr>
											<tr>
												<td>Sadain Saem</td>
												<td>saem_010</td>
												<td>Editor</td>
												<td>+88 015 11 101 101</td>
												<td>saem@gmail.com</td>
												<td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
											</tr>
											<tr>
												<td>Zayan Shams</td>
												<td>zayan_001</td>
												<td>Operator</td>
												<td>+88 018 11 101 101</td>
												<td>shams@yahoo.com</td>
												<td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
											</tr>
											
										</tbody>
									</table>
								</div>	<!-- /widget-content --> 
							</div>	<!-- /widget -->
						</div>	<!-- /span12 --> 
					</div>	<!-- /row --> 
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
			});
		</script>
	</body>
</html>
