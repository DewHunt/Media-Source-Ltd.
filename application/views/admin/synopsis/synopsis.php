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
						<?php include APPPATH.'views/admin/master/admin-left-menu.php'; ?>
						
						<div class="span9">
							<div class="widget widget-table action-table">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>Today's News</h3> 
								</div>  <!-- /widget-header -->

								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Date</th>
												<th>News</th>
												<th>Status</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td>
													<div class="news-item-date">
														<span class="news-item-day">15</span>
														<span class="news-item-month">Nov</span>
													</div>
												</td>
												<td>
													<div class="news-item-detail">
														<a href="<?= base_url('index.php/Synopsis/CreateSynopsis'); ?>" class="news-item-title" target="_blank">সমতায় শেষ হলো বাংলাদেশ-জিম্বাবুয়ে টেস্ট সিরিজ </a>
														<p class="news-item-preview">এই ম্যাচ বাঁচাতে হলে জিম্বাবুয়েকে ব্যাট করতে হবে ১২০ ওভার। ৩০ ওভার এরই মধ্যে পাড়ি দিয়েছে তারা। বাকি আছে আরও ৯০। জিম্বাবুয়ে পারবে?</p>
													</div>
												</td>
												<td>Published</td>
											</tr>                  

											<tr>
												<td>
													<div class="news-item-date">
														<span class="news-item-day">14</span>
														<span class="news-item-month">Jun</span>
													</div>
												</td>
												<td>
													<div class="news-item-detail">
														<a href="create-synopsis-00.html" class="news-item-title" target="_blank">কমিক দুনিয়ায় চমকে দেওয়া হিরো স্ট্যান লি পৃথিবীর মায়া ত্যাগ করেছেন</a>
														<p class="news-item-preview">অনেক নায়ক সৃষ্টি করেছেন স্ট্যান লি। সেই নায়কদের নানা কীর্তিকলাপ এক সময় শুধুই ছাপাখানা থেকে বের হতো। ধীরে ধীরে রূপালি পর্দায় রাজত্ব বিস্তার করেছে স্ট্যান লি’র তৈরি সুপার হিরোরা</p>
													</div>
												</td>
												<td>Not Published</td>
											</tr>                  

											<tr>
												<td>
													<div class="news-item-date">
														<span class="news-item-day">12</span>
														<span class="news-item-month">Oct</span>
													</div>
												</td>
												<td>
													<div class="news-item-detail">
														<a href="create-synopsis-00.html" class="news-item-title" target="_blank">বদলে গেছে সকালের নাশতা</a>
														<p class="news-item-preview">রুচির বদল এখন কেবল পোশাক বা সাজে থেমে নেই, দৈনন্দিন খাদ্যাভ্যাসও পাল্টাচ্ছে। চালু হচ্ছে নতুন ধারা। পুষ্টিবিদেরা বলেন, সারা দিনের কাজে শক্তি পেতে ভালো ও স্বাস্থ্যকর নাশতার বিকল্প নেই।</p>
													</div>
												</td>
												<td>Published</td>
											</tr>
										</tbody>
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
		</script>
	</body>
</html>
