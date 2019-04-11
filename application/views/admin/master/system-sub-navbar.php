
		<?php
			$link_0 = "";
			$link_1 = "";
			$link_2 = "";
			$link_3 = "";
			$link_4 = "";
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

			if ($active == 3)
			{
				$link_3 = "active";
			}

			if ($active == 4)
			{
				$link_4 = "active";
			}
		?>
		<div class="subnavbar">
			<div class="subnavbar-inner">
				<div class="container">
					<ul class="mainnav">
						<li class="<?= $link_0; ?>"><a href="<?= base_url('index.php/Admin/Dashboard'); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
						
						<li class="dropdown <?= $link_1; ?>">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-long-arrow-down"></i>
								<span>Media Setup</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('index.php/MediaName/Index'); ?>">Media Name</a></li>
								<li><a href="<?= base_url('index.php/Publication/Index'); ?>">Publication</a></li>
								<li><a href="<?= base_url('index.php/PublicationFrequency/Index'); ?>">Publication Frequency</a></li>
								<li><a href="<?= base_url('index.php/PublicationPlace/Index'); ?>">Publication Place</a></li>
								<li><a href="<?= base_url('index.php/PublicationType/Index'); ?>">Publication Type</a></li>
								<li><a href="<?= base_url('index.php/ProductCategory/Index'); ?>">Product Category</a></li>
								<li><a href="<?= base_url('index.php/Product/Index'); ?>">Products</a></li>
							</ul>
						</li>
						
						<li class="dropdown <?= $link_2; ?>">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-long-arrow-down"></i>
								<span>Page Setup</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('index.php/Placing/Index'); ?>">Placing</a></li>
								<li><a href="<?= base_url('index.php/PlacingType/Index'); ?>">Placing Type</a></li>
								<li><a href="<?= base_url('index.php/Page/Index'); ?>">Page</a></li>
								<li><a href="<?= base_url('index.php/Hue/Index'); ?>">Hue</a></li>
								<li><a href="<?= base_url('index.php/Price/Index'); ?>">Price</a></li>
							</ul>
						</li>
						
						<li class="dropdown <?= $link_3; ?>">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-long-arrow-down"></i>
								<span>News Setup</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('index.php/NewsType/Index'); ?>">News Type</a></li>
								<li><a href="<?= base_url('index.php/NewsCategory/Index'); ?>">News Category</a></li>
							</ul>
						</li>
						
						<li class="dropdown <?= $link_4; ?>">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-long-arrow-down"></i>
								<span>Advertise Setup</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('index.php/AdvertiseCategory/Index'); ?>">Advertise Category</a></li>
								<li><a href="<?= base_url('index.php/AdvertiseInfo/Index'); ?>">Advertise Info</a></li>
								<li><a href="<?= base_url('index.php/Company/Index'); ?>">Company</a></li>
								<li><a href="<?= base_url('index.php/Brand/Index'); ?>">Brand</a></li>
								<li><a href="<?= base_url('index.php/SubBrand/Index'); ?>">Sub Brand</a></li>
								<li><a href="<?= base_url('index.php/Keyword/Index'); ?>">Keyword</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- /container --> 
			</div>
			<!-- /subnavbar-inner --> 
		</div>
		<!-- /subnavbar -->