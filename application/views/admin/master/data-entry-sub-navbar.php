
		<?php
			$link_0 = "";
			$link_1 = "";
			$link_2 = "";
			if ($active == 0)
			{
				$link_0 = "active";
			}

			if ($active == 1)
			{
				$link_1 = "active";
			}

			if ($active == 2)
			{
				$link_2 = "active";
			}
		?>

		<div class="subnavbar">
			<div class="subnavbar-inner">
				<div class="container">
					<ul class="mainnav">
						<li class="<?= $link_0; ?>"><a href="<?= base_url('index.php/Admin/Dashboard'); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
						<li class="<?= $link_1; ?>"><a href="<?= base_url('index.php/DataEntry/Index/1'); ?>"><i class="icon-tag"></i><span>Advertise Entry</span></a></li>
						<li class="<?= $link_2; ?>"><a href="<?= base_url('index.php/NewsEntry/Index'); ?>"><i class="icon-tag"></i><span>News Entry</span></a></li>
					</ul>
				</div>
				<!-- /container --> 
			</div>
			<!-- /subnavbar-inner --> 
		</div>
		<!-- /subnavbar -->