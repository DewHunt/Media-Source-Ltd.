<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include APPPATH.'views/admin/master/header.php'; ?>
	</head>
	
	<body>
		<?php include APPPATH.'views/admin/master/navbar.php'; ?>

		<?php include APPPATH.'views/admin/master/data-entry-sub-navbar.php'; ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<?php include APPPATH.'views/admin/master/data-entry-left-menu.php'?>
						
						<div class="span9">

							<?php
								if ($message == 1)
								{
							?>
									<div class="alert alert-success success-message">
										<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/NewsEntry/Index'); ?>">&times;</a>
										<strong>Greate!</strong> Your News Updated...
									</div>
							<?php
								}
							?>
							<div class="widget">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>All News Information</h3>
									<a href="<?= base_url('index.php/NewsEntry/NewsEntry'); ?>" type="submit" class="btn btn-primary" target="_blank">Create News</a> 
								</div>  <!-- /widget-header -->
								<div class="widget-content">
									<table id="news-entry-data" class="table">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Batch</th>
												<th>Date</th>
												<th>Media Name</th>
												<th>Caption</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>1</td>
												<td>2</td>
												<td>2019-01-06</td>
												<td>Prothom Alo</td>
												<td>দুই মাস মশার ঔষুধ ছিটা্নোই হয়নি</td>
												<td></td>
											</tr>
											
											<tr>
												<td>2</td>
												<td>3</td>
												<td>2019-01-06</td>
												<td>Prothom Alo</td>
												<td>চট্টগ্রাম থেকে মোড়কজাত লবণ</td>
												<td></td>
											</tr>
											
											<tr>
												<td>3</td>
												<td>10</td>
												<td>2018-12-01</td>
												<td>Prothom Alo</td>
												<td>ছবি এঁকে পুরষ্কার পলে খুদে আঁকিয়েরা</td>
												<td></td>
											</tr>

											<tr>
												<td>4</td>
												<td>10</td>
												<td>2018-12-03</td>
												<td>Prothom Alo</td>
												<td>দলমত-নির্বিশেষে ব্যবসায়ীদের জন্য দরজা খোলাঃ প্রধানমন্ত্রী</td>
												<td></td>
											</tr>
										</tbody>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Batch</th>
												<th>Date</th>
												<th>Media Name</th>
												<th>Caption</th>
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
		</script>
	</body>
</html>
