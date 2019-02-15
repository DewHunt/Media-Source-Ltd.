		<div class="subnavbar">
			<div class="subnavbar-inner">
				<div class="container">
					<ul class="mainnav">
						<li class="active"><a href="<?= base_url('index.php/Admin/Dashboard'); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
						
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-long-arrow-down"></i>
								<span>Data Entry</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('index.php/AdvertiseEntry/Index'); ?>">Advertise Entry</a></li>
								<li><a href="<?= base_url('index.php/NewsEntry/Index'); ?>">News Entry</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- /container --> 
			</div>
			<!-- /subnavbar-inner --> 
		</div>
		<!-- /subnavbar -->