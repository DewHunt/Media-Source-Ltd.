
		<meta charset="utf-8">
		<title>
			<?php
				if (!empty($title))
				{ 
					echo $title; 
				}
				else
				{ 
					echo 'Media Source Limited'; 
				}
			?> 
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
            
		<?= link_tag('assets/css/bootstrap.min.css'); ?>

		<?= link_tag('assets/css/bootstrap-responsive.min.css'); ?>

		<?= link_tag('assets/css/fonts-googleapis.css'); ?>
		<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet"> -->

		<?= link_tag('assets/css/font-awesome.css'); ?>
		<!-- <link href="http://localhost/media_19/assets/css/font-awesome.css" rel="stylesheet"> -->

		<?= link_tag('assets/css/style.css'); ?>

		<?= link_tag('assets/css/pages/dashboard.css'); ?>

		<?= link_tag('assets/css/pages/signin.css'); ?>

		<!-- Data Tables CSS File Include -->
		<?= link_tag('assets/css/data_tables/dataTables.bootstrap.min.css'); ?>

		<!-- Date Picker CSS File Include -->
		<?= link_tag('assets/datepicker/css/datepicker.css'); ?>

		<!-- Chosen CSS File Include -->
		<?= link_tag('assets/chosen/chosen.css'); ?>

		<!-- Left Menu CSS File Inlcude -->
		<?= link_tag('assets/css/left-menu.css'); ?>

		<!-- Toast Message CSS File Include -->
		<?= link_tag('assets/css/toast-message.css'); ?>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Custome CSS File For All Page -->
		<style type="text/css">
			.mendatory{
				color: red;
				font-weight: bold;
			}

			.paginition{
				margin: 0px;
			}
		</style>