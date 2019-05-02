		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.html">Media Source Ltd.</a>
					<div class="nav-collapse">
						<ul class="nav pull-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-cog"></i>&nbsp;<b>Account</b>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="javascript:;">Settings</a></li>
									<li><a href="javascript:;">Help</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-user"></i>&nbsp;<b><?= $adminInfo->DesignationId;?> - <?= $adminInfo->Name; ?></b>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?= base_url('index.php/Admin/EditProfile/'.$adminInfo->Id);?>">Edit Profile</a></li>
									<li><a href="<?= base_url('index.php/Admin/ChangePassword/');?>">Change Password</a></li>
									<li><a href="<?= base_url('index.php/Admin/Logout'); ?>">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div> <!--/.nav-collapse --> 
				</div>  <!-- /container --> 
			</div> <!-- /navbar-inner --> 
		</div>  <!-- /navbar -->