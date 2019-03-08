		<div class="subnavbar">
			<div class="subnavbar-inner">
				<div class="container">
					<ul class="mainnav">
						<li class="active"><a href="<?= base_url('index.php/Admin/Dashboard'); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
						
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-long-arrow-down"></i>
								<span>Reports</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('index.php/Report/Index/1'); ?>">Advertise Reports</a></li>
								<li><a href="<?= base_url('index.php/NewsReports/Index'); ?>">News Reports</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- /container --> 
			</div>
			<!-- /subnavbar-inner --> 
		</div>
		<!-- /subnavbar -->