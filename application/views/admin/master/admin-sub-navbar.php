
		<?php
			$link_0 = "";
			$link_1 = "";
			$link_2 = "";
			$link_6 = "";
			$link_7 = "";
			$link_8 = "";

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

			if ($active == 6)
			{
				$link_6 = "active";
			}

			if ($active == 7)
			{
				$link_7 = "active";
			}

			if ($active == 8)
			{
				$link_8 = "active";
			}
		?>
		<div class="subnavbar">
			<div class="subnavbar-inner">
				<div class="container">
					<ul class="mainnav">
						<li class="<?= $link_0; ?>"><a href="<?= base_url('index.php/Admin/Dashboard'); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>

						<?php
							if ($adminInfo->DesignationId == "Admin")
							{
						?>
							<li class="<?= $link_1; ?>"><a href="<?= base_url('index.php/Client/Index'); ?>"><i class="icon-user"></i><span>All Clients</span> </a> </li>

							<li class="<?= $link_2; ?>"><a href="<?= base_url('index.php/Account/Index'); ?>"><i class="icon-user"></i><span>All Accounts</span> </a> </li>

							<li><a href="<?= base_url('index.php/SystemSetup/Index'); ?>"><i class="icon-gear"></i><span>System Setup</span> </a> </li>

							<li><a href="<?= base_url('index.php/DataEntry/Index'); ?>"><i class="icon-tag"></i><span>Data Entry</span> </a> </li>

							<li><a href="<?= base_url('index.php/Report/Index'); ?>"><i class="icon-tag"></i><span>Reports</span> </a> </li>

							<li class="<?= $link_6; ?>"><a href="<?= base_url('index.php/Synopsis/Index'); ?>"><i class="icon-tag"></i><span>Synopsis</span> </a> </li>

							<li class="<?= $link_7; ?>"><a href="<?= base_url('index.php/PreviousSynopsis/Index'); ?>"><i class="icon-tag"></i><span>Previous Synopsis</span> </a> </li>
						<?php
							}
							else
							{
								if ($adminInfo->DesignationId == "Operator")
								{
						?>
								<li><a href="<?= base_url('index.php/SystemSetup/Index'); ?>"><i class="icon-gear"></i><span>System Setup</span> </a> </li>

								<li><a href="<?= base_url('index.php/DataEntry/Index'); ?>"><i class="icon-tag"></i><span>Data Entry</span> </a> </li>

								<li><a href="<?= base_url('index.php/Report/Index'); ?>"><i class="icon-tag"></i><span>Reports</span> </a> </li>

								<li class="<?= $link_6; ?>"><a href="<?= base_url('index.php/Synopsis/OperatorSynopsis'); ?>"><i class="icon-tag"></i><span>Synopsis</span> </a> </li>
						<?php
								}
								else
								{
						?>
								<li class="<?= $link_6; ?>"><a href="<?= base_url('index.php/Synopsis/Index'); ?>"><i class="icon-tag"></i><span>Synopsis</span> </a> </li>

								<li class="<?= $link_7; ?>"><a href="<?= base_url('index.php/PreviousSynopsis/Index'); ?>"><i class="icon-tag"></i><span>Previous Synopsis</span> </a> </li>

								<li class="<?= $link_8; ?>"><a href="<?= base_url('index.php/Synopsis/AllCompletedSynopsis'); ?>"><i class="icon-tag"></i><span>All Completed Synopsis</span> </a> </li>
						<?php
								}
							}
						?>
					</ul>
				</div>  <!-- /container --> 
			</div> <!-- /subnavbar-inner --> 
		</div>  <!-- /subnavbar -->