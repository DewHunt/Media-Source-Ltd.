
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
		<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

		<?= link_tag('assets/css/bootstrap-responsive.min.css'); ?>
		<!-- <link href="css/bootstrap-responsive.min.css" rel="stylesheet"> -->

		<?= link_tag('assets/css/fonts-googleapis.css'); ?>
		<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet"> -->

		<?= link_tag('assets/css/font-awesome.css'); ?>
		<!-- <link href="http://localhost/media_19/assets/css/font-awesome.css" rel="stylesheet"> -->

		<?= link_tag('assets/css/style.css'); ?>
		<!-- <link href="css/style.css" rel="stylesheet"> -->

		<?= link_tag('assets/css/pages/dashboard.css'); ?>
		<!-- <link href="css/pages/dashboard.css" rel="stylesheet"> -->

		<?= link_tag('assets/css/pages/signin.css'); ?>
		<!-- <link href="css/pages/signin.css" rel="stylesheet" type="text/css"> -->

		<!-- Date Picker CSS File Include -->
		<?= link_tag('assets/datepicker/css/datepicker.css'); ?>
		<!-- <link href="datepicker/css/datepicker.css" rel="stylesheet"> -->

		<!-- Chosen CSS File Include -->
		<?= link_tag('assets/chosen/chosen.css'); ?>
		<!-- <link href="chosen/chosen.css" rel="stylesheet"> -->

		<!-- Left Menu CSS File Inlcude -->
		<?= link_tag('assets/css/left-menu.css'); ?>
		<!-- <link href="css/left-menu.css" rel="stylesheet"> -->

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->