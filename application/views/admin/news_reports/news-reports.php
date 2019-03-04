<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include APPPATH.'views/admin/master/header.php'; ?>
		<style>
			#tab {
				font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			#tab td, #tab th {
				border: 1px solid #ddd;
				padding: 8px;
			}

			#tab tr:nth-child(even){background-color: #f2f2f2;}

			#tab tr:hover {background-color: #ddd;}

			#tab th {
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: left;
				background-color: #4CAF50;
				color: white;
			}

			#tab-scroll{
				display: block;
				height: 500px;
				overflow: auto;
			}

			.xls-btn{
				width: 100%;
				height: 50px;
				color: black;
				font-size: 30px;
				font-weight: bold;
			}
		</style>
	</head>
	
	<body>
		<?php include APPPATH.'views/admin/master/navbar.php'; ?>

		<?php include APPPATH.'views/admin/master/admin-sub-navbar.php'; ?>
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					<div class="row">
						<div class="span12">

							<?php
							if ($message == 1)
							{
								?>
								<div class="alert alert-success success-message">
									<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/NewsEntry/NewsEntry');?>">&times;</a>
									<strong>Great!</strong> Your News Created Successfully...
								</div>
								<?php
							}

							if ($message == 2)
							{
								?>
								<div class="alert alert-info error-message">
									<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/NewsEntry/NewsEntry'); ?>">&times;</a>
									<strong>Oops! Sorry,</strong> Your News Can't Be Created...
								</div>
								<?php
							}

							if ($message == 3)
							{
								?>
								<div class="alert alert-info error-message">
									<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/NewsEntry/NewsEntry'); ?>">&times;</a>
									<strong>Oops! Sorry,</strong> Your News Already Saved In Data Base...
								</div>
								<?php
							}
							?>
							<div class="widget">
								<div class="widget-header">
									<i class="icon-tag"></i>
									<h3>News Reports</h3>
								</div>	<!-- /widget-header -->

								<div class="widget-content">
									<form id="news-reports-form" method="POST" action="<?= base_url('index.php/NewsReports/SearchNewsReports'); ?>">
										<table class="table table-striped table-bordered">
											<tfoot>
												<tr>
													<td colspan="2">
														<button type="submit" id="button-news-reports" name="button-news-reports" class="btn btn-primary" onclick="return Validation()">Search News</button>
														<a type="button" class="btn btn-danger" href="<?= base_url('index.php/NewsReports/Index'); ?>">Refresh</a>

													</td>
												</tr>
											</tfoot>

											<tbody>
												<tr>
													<th>
														<span class="mendatory">*</span>&nbsp;Date
													</th>
													<td>
														<input class="date-picker" type="text" id="fromDate" name="fromDate" placeholder="Select Date (M/D/Y)">
														To
														<input class="date-picker" type="text" id="toDate" name="toDate" placeholder="Select Date (M/D/Y)">
													</td>
												</tr>

												<tr>
													<th>
														<span class="mendatory">*</span>&nbsp;Media
													</th>
													<td>
														<div id="media-select-menu"></div>
													</td>										
												</tr>

												<tr>
													<th>
														<span class="mendatory">*</span>&nbsp;Publication
													</th>

													<td>
														<div id="publication-select-menu">
															<select class="dropdown" name="publication-id" id="publication-id" style="width: 99%;">
																<option value="">Select Publication</option>
															</select>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</form>

									<?php
										if ($show == 1)
										{
									?>
										<form id="create-xls-form" method="POST" action="<?= base_url('index.php/NewsReports/CreateExcel'); ?>">
											<button type="submit" id="button-create-xls" name="button-create-xls" class="btn btn-primary btn-lg xls-btn">Create Excel</button>
										</form>

										<div id="tab-scroll">
											<table id="tab">
												<thead>
													<tr>
														<th colspan="25" style="text-align: center;"><h1>News Reports</h1></th>
													</tr>
													<tr>
														<th>SL</th>
														<th>Date</th>
														<th>Media Name</th>
														<th>Publication Name</th>
														<th>Publication Type</th>
														<th>Publication Place</th>
														<th>Publication Language</th>
														<th>Publication Frequency</th>
														<th>Company</th>
														<th>Brand</th>
														<th>Sub Brand</th>
														<th>Title</th>
														<th>Product Name</th>
														<th>Product Category</th>
														<th>Page Name</th>
														<th>Page Number</th>
														<th>Placing Name</th>
														<th>Placing Type</th>
														<th>Hue</th>
														<th>Cols</th>
														<th>Inchs</th>
														<th>Cols×Inchs</th>
														<th>Cost</th>
														<th>Ad Type</th>
														<th>Ad Theme</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
														<td>Text Data</td>
													</tr>
												</tbody>
											</table>
										</div>
									<?php
										}
										elseif ($show == 2)
										{
									?>
										<table id="tab">
											<thead>
												<tr>
													<th style="text-align: center;"><h1>News Reports</h1></th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td style="color: red; text-align: center; font-weight: bold;">
														<h3>Oops! Sorry, Data Not Found</h3>
													</td>
												</tr>
											</tbody>
										</table>
									<?php
										}
									?>																		
								</div>	<!-- /widget-content -->
							</div> <!-- /widget -->
						</div>	<!-- /span12 -->
					</div>	<!-- /row --> 
					<!-- <input type="number" name="sl" id="sl" value="1" hidden>  -->
				</div>	<!-- /container --> 
			</div>	<!-- /main-inner --> 
		</div>	<!-- /main -->

		<?php include APPPATH.'views/admin/master/footer.php'; ?>

		<!-- Custome JS File Include -->
		<script type="text/javascript">
			
			$(document).ready(function(){
				$(".chosen-select").chosen({
					width: "80px"
				});
			});
			
			$(function(){
				$(".date-picker").datepicker();
			});


			GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu","media-name-id","Select Media",0);

			$(document).on('change', '#media-name-id', function(){
				var id = $('#media-name-id').val();
				GetDataForDependantSelectMenu("PublicationModel","GetPublicationByForignKey","MediaId",id,"#publication-select-menu","publication-id","Select Publication",0);
			});

			// Get All Data For Select Menu Script Start
			function GetDataForSelectMenu(modelName,methodName,divId,idNameAttr,selectHeader)
			{
				$.ajax({
					type:'ajax',
					url:'<?php echo base_url('index.php/SelectMenu/GetDataForSelectMenu'); ?>',
					method:'POST',
					data:{modelName:modelName,methodName:methodName,idNameAttr:idNameAttr,selectHeader:selectHeader},
					success:function(data){
						$(divId).html(data);
					}
				});
			} 

			function GetDataForDependantSelectMenu(modelName,methodName,fieldName,id,divId,idNameAttr,selectHeader)
			{
				$.ajax({
					type:'ajax',
					url:'<?php echo base_url('index.php/SelectMenu/GetDataForDependantSelectMenu'); ?>',
					method:'POST',
					data:{modelName:modelName,methodName:methodName,fieldName:fieldName,id:id,idNameAttr:idNameAttr,selectHeader:selectHeader},
					success:function(data){
						$(divId).html(data);
					}
				});
			} 
			// Get All Data For Select Menu Script End

			// function Validation()
			// {
			// 	var date = $('#date').val();
			// 	var mediaId = $('#media-name-id').val();
			// 	var publicationId = $('#publication-id').val();

			// 	var totalRow = $('#sl').val();

			// 	if (date == 0)
			// 	{
			// 		alert("Date Can't Be Empty");
			// 		$('#date').focus();
			// 		return false;
			// 	}

			// 	if (mediaId == 0)
			// 	{
			// 		alert("Media Name Can't Be Empty");
			// 		$('#media-name-id').focus();
			// 		return false;
			// 	}

			// 	if (publicationId == 0)
			// 	{
			// 		alert("Publication Can't Be Empty");
			// 		$('#publication-id').focus();
			// 		return false;
			// 	}

			// 	for (var i = 1; i <= totalRow; i++)
			// 	{
			// 		var captionIdAttr = "#caption-"+i;
			// 		var newsTypeIdAttr = "#news-type-id-"+i;
			// 		var newsCategoryIdAttr = "#news-category-id-"+i;
			// 		var pageNameIdAttr = "#page-id-"+i;
			// 		var pageNoIdAttr = "#page-no-"+i;
			// 		var positionIdAttr = "#position-"+i;
			// 		var hueIdAttr = "#hue-id-"+i;
			// 		var productIdAttr = "#product-id-"+i;
			// 		var colIdAttr = "#col-"+i;
			// 		var inchIdAttr = "#inch-"+i;
			// 		var subBrandIdAttr = "#sub-brand-id-"+i;
			// 		var keywordIdAttr = "#keyword-id-"+i;

			// 		if ($(captionIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Caption Can't be Empty");
			// 			$(captionIdAttr).focus();
			// 			return false;
			// 		}

			// 		if ($(newsTypeIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", News Type Can't Be Empty.");
			// 			$(newsTypeIdAttr).focus();
			// 			return false;
			// 		}

			// 		if ($(newsCategoryIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", News Category Can't Be Empty");
			// 			$(newsCategoryIdAttr).focus();
			// 			return false;
			// 		}

			// 		if ($(pageNameIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Page Name Can't be Empty");
			// 			$(pageNameIdAttr).focus();
			// 			return false;
			// 		}

			// 		if ($(positionIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Position Can't be Empty");
			// 			$(positionIdAttr).focus();
			// 			return false;
			// 		}

			// 		if ($(hueIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Hue Can't be Enpty");
			// 			$(hueIdAttr).focus();
			// 			return false;
			// 		}

			// 		if ($(productIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Product Can't be Enpty");
			// 			$(productIdAttr).focus();
			// 			return false;
			// 		}

			// 		if ($(colIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+",  Column be Enpty");
			// 			$(colIdAttr).focus();
			// 			return false;
			// 		}

			// 		if ($(inchIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Inch Can't be Enpty");
			// 			$(inchIdAttr).focus();
			// 			return false;
			// 		}

			// 		if ($(subBrandIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Sub Brand Can't be Enpty");
			// 			$(subBrandIdAttr).focus();
			// 			return false;
			// 		}

			// 		if ($(keywordIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Keyword Can't be Enpty");
			// 			$(keywordIdAttr).focus();
			// 			return false;
			// 		}
			// 	}
			// }
		</script>
	</body>
</html>
