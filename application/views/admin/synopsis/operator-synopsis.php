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

			#tab tr:nth-child(even){
				background-color: #f2f2f2;
			}

			#tab td:hover {
				background-color: #ddd;
				border: 2px solid #000;
			}

			#tab th {
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: left;
				background-color: #4CAF50;
				color: black;
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
							<div class="widget">
								<div class="widget-header">
									<i class="icon-tag"></i>
									<h3>News Synopsis</h3>
								</div>	<!-- /widget-header -->

								<div class="widget-content">
									<form id="news-reports-form" method="POST" action="<?= base_url('index.php/Synopsis/SearchNews'); ?>">

										<?php
											if ($message == 1)
											{
										?>
												<div class="alert alert-success success-message">
													<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/Synopsis/OperatorSynopsis');?>">&times;</a>
													<strong>Great!</strong> All Selected News Send To Editor Successfully...
												</div>
										<?php
											}

											if ($message == 2)
											{
										?>
												<div class="alert alert-info error-message">
													<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Synopsis/OperatorSynopsis'); ?>">&times;</a>
													<strong>Oops! Sorry,</strong> Your Selected News Can't Be Send To Editor...
												</div>
										<?php
											}
										?>
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>Date</th>
													<th>Media</th>
													<th>Publication</th>
													<th>Brand</th>
													<th>Product</th>
													<th>Keyword</th>
												</tr>
											</thead>

											<tfoot>
												<tr>
													<td colspan="6">
														<button type="submit" id="button-news-reports" name="button-news-reports" class="btn btn-primary" onclick="return Validation()">Search News</button>
														<a type="button" class="btn btn-danger" href="<?= base_url('index.php/NewsReports/Index'); ?>">Refresh</a>

													</td>
												</tr>
											</tfoot>

											<tbody>
												<tr>
													<td>
														<input class="date-picker" type="text" id="from-date" name="from-date" placeholder="Select Date From" data-date-format="yyyy-mm-dd" style="width: 42%;">
														To
														<input class="date-picker" type="text" id="to-date" name="to-date" placeholder="Select Date To" data-date-format="yyyy-mm-dd" style="width: 42%;">
													</td>

													<td><div id="media-select-menu"></div></td>

													<td>
														<div id="publication-select-menu">
															<select class="dropdown" name="publication-id" id="publication-id" style="width: 99%;">
																<option value="">Select Publication</option>
															</select>
														</div>
													</td>

													<td><div id="brand-select-menu"></div></td>
													<td><div id="product-select-menu"></div></td>
													<td><div id="keyword-select-menu"></div></td>
												</tr>
											</tbody>
										</table>
									</form>

									<?php
										if ($show == 0)
										{
									?>
										<table id="synopsis-data" class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>Sl</th>
													<th>Title</th>
													<th>Content</th>
													<th>Reference</th>
													<th>Action</th>
												</tr>
											</thead>

											<tfoot>
												<tr>
													<th>Sl</th>
													<th>Title</th>
													<th>Content</th>
													<th>Reference</th>
													<th>Action</th>
												</tr>
											</tfoot>
										</table>
									<?php
										}
										elseif ($show == 1)
										{
									?>
										<form id="create-xls-form" method="POST" action="<?= base_url('index.php/Synopsis/SendSynopsis'); ?>">

											<table>
												<thead>
													<tr>
														<th>From Date</th>
														<th>To Date</th>
														<th>Media Name</th>
														<th>Publication Name</th>
														<th>Brand Name</th>
														<th>Product Name</th>
														<th>Keyword name</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>
															<input type="test" readonly="readonly" name="from-date" value="<?= $fromDate; ?>" style="width: 90%;">
														</td>
														<td>
															<input type="test" readonly="readonly" name="to-date" value="<?= $toDate; ?>" style="width: 90%;">
														</td>
														<td>
															<input type="test" readonly="readonly" name="media-name" value="<?= $mediaName; ?>" style="width: 90%;">
														</td>
														<td>
															<input type="test" readonly="readonly" name="publication-name" value="<?= $publicationName; ?>" style="width: 90%;">
														</td>
														<td>
															<input type="test" readonly="readonly" name="brand-name" value="<?= $brandName; ?>" style="width: 90%;">
														</td>
														<td>
															<input type="test" readonly="readonly" name="product-name" value="<?= $productName; ?>" style="width: 90%;">
														</td>
														<td>
															<input type="test" readonly="readonly" name="keyword-name" value="<?= $keywordName; ?>" style="width: 90%;">
														</td>
													</tr>
												</tbody>
											</table>

											<hr>

											<table class="table table-bordered table-striped">
												<tbody>
													<tr>
														<th>Title</th>
														<td>
															<input type="text" class="span10" name="synopsis-title" id="synopsis-title" placeholder="Enter Synposis Title">
														</td>
													</tr>

													<tr>
														<th>Content</th>
														<td>
															<input type="text" class="span10" name="synopsis-content" id="synopsis-content" placeholder="Enter Synposis Content">
														</td>
													</tr>

													<tr>
														<th>Reference</th>
														<td>
															<!-- <input type="text" class="span10" name="synopsis-reference-id" id="synopsis-reference-id" value="<?= $referenceId; ?>" readonly="readonly"> -->

															<input type="text" class="span10" name="synopsis-reference" id="synopsis-reference" value="" placeholder="Enter Synopsis Reference">
														</td>
													</tr>
												</tbody>

												<tfoot>
													<tr>
														<td colspan="2">
															<button type="submit" id="button-create-xls" name="button-create-xls" class="btn btn-primary btn-lg xls-btn" onclick="return synopsisCheck()">Send Synopsis To Editor</button>
														</td>
													</tr>
												</tfoot>
											</table>

											<div id="tab-scroll">
												<table id="tab">
													<thead>
														<tr>
															<th colspan="26" style="text-align: center;"><h1>News Reports</h1></th>
														</tr>
														<tr>
															<th>SL</th>
															<th>
																<input type="checkbox" name="chk_all" id="chk_all" value="checkbox" onclick="checkall()">
															</th>
															<th>Date</th>
															<th>Caption</th>
															<th>Media Name</th>
															<th>Publication Name</th>
															<th>Publication Type</th>
															<th>Publication Place</th>
															<th>Publication Language</th>
															<th>Publication Frequency</th>
															<th>Company</th>
															<th>Brand</th>
															<th>Sub Brand</th>
															<!-- <th>News Type</th> -->
															<!-- <th>News Category</th> -->
															<th>Product Name</th>
															<th>Product Category</th>
															<th>Page Name</th>
															<th>Page Number</th>
															<!-- <th>Position</th> -->
															<!-- <th>Hue</th> -->
															<!-- <th>Cols</th> -->
															<!-- <th>Inchs</th> -->
															<!-- <th>Cols×Inchs</th> -->
															<!-- <th>Cost (BDT)</th> -->
															<!-- <th>PR Values (BDT)</th> -->
															<th>Keyword</th>
														</tr>
													</thead>

													<tbody>
														<?php
															$sl = 1;
															$i = 1;
															foreach ($result as $value)
															{
														?>
															<tr>
																<td><?= $sl; ?></td>
																<td>
																	<input type="checkbox" name="chk_<?php echo $i?>"  id="chk_<?php echo $i?>" value="<?php echo $value->Id;?>">
																</td>
																<td><?= $value->Date; ?></td>
																<td><?= $value->Caption; ?></td>
																<td><?= $value->MediaId; ?></td>
																<td><?= $value->PublicationName; ?></td>
																<td><?= $value->PublicationType; ?></td>
																<td><?= $value->PublicationPlace; ?></td>
																<td><?= $value->PublicationLan; ?></td>
																<td><?= $value->PublicationFreq; ?></td>
																<td><?= $value->Company; ?></td>
																<td><?= $value->BrandName; ?></td>
																<td><?= $value->subBrand; ?></td>
																<!-- <td><?= $value->NewstypeName; ?></td> -->
																<!-- <td><?= $value->outlook; ?></td> -->
																<td><?= $value->ProductName; ?></td>
																<td><?= $value->ProductCatName; ?></td>
																<td><?= $value->PageId; ?></td>
																<td><?= $value->PageNo; ?></td>
																<!-- <td><?= $value->PositionName; ?></td> -->
																<!-- <td><?= $value->HueName; ?></td> -->
																<!-- <td><?= $value->Cols; ?></td> -->
																<!-- <td><?= $value->Inchs; ?></td> -->
																<!-- <td><?= $value->Cols * $value->Inchs; ?></td> -->
																<!-- <td><?= $value->Price * $value->Cols * $value->Inchs; ?></td> -->
																<!-- <td><?= $value->Price * $value->Cols * $value->Inchs * 3; ?></td> -->
																<td><?= $value->Keyword; ?></td>
															</tr>
														<?php
																$sl++;
																$i++;
															}
														?>
													</tbody>
												</table>
											</div>
											<input type="text" value="<?php echo $i?>" id="allvalue" name="allvalue"  />
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
										</form>																		
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

			GetDataForSelectMenu("BrandModel","GetAllBrand","#brand-select-menu","brand-id","Select Brand",0);
			GetDataForSelectMenu("ProductModel","GetAllProduct","#product-select-menu","product-id","Select Product",0);
			GetDataForSelectMenu("KeywordModel","GetAllKeyword","#keyword-select-menu","keyword-id","Select Keyword",0);

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

			function Validation()
			{
				var fromDate = $('#from-date').val();
				var toDate = $('#to-date').val();
				var mediaId = $('#media-name-id').val();
				var publicationId = $('#publication-id').val();
				var brandId = $('#brand-id').val();
				var productId = $('#product-id').val();
				var keywordId = $('#keyword-id').val();

				if (fromDate == "" && toDate == "" && mediaId == 0 && publicationId == 0 && brandId == 0 && productId == 0 && keywordId == 0)
				{
					alert("Please Select At Least One Search Option");
					$('#from-date').focus();
					$('#from-date').css({'border':'1px solid red'});
					return false;
				}
				else
				{
					if (fromDate != "")
					{
						if (toDate == "")
						{
							alert("Please Select Date To");
							$('#to-date').css({'border':'1px solid red'});
							$('#to-date').focus();
							return false;
						}
					}

					if (toDate != "")
					{
						if (fromDate == "")
						{
							alert("Please Select Date From");
							$('#from-date').css({'border':'1px solid red'});
							$('#from-date').focus();
							return false;
						}
					}
				}
			}

			function checkall()
			{
				if($('#chk_all').is(':checked'))
				{
					$('#tab :checkbox').attr('checked',true);
				}
				else
				{
					$('#tab :checkbox').attr('checked',false);
				}
			}

			function synopsisCheck()
			{
				var title = $('#synopsis-title').val();
				var content = $('#synopsis-content').val();

				$('#synopsis-title').css({'border':'1ps solid #cccccc'});
				$('#synopsis-content').css({'border':'1ps solid #cccccc'});

				if (title == "")
				{
					alert("Oops! Synopsis Title Can't Be Empty. Please Enter Synopsis Title.");
					$('#synopsis-title').css({'border':'1px solid red'});
					return false;					
				}

				if (content == "")
				{
					alert("Oops! Synopsis Content Can't Be Empty. Please Enter Synopsis Content.");
					$('#synopsis-content').css({'border':'1px solid red'});
					return false;					
				}

				var k=0;
				for(i=0;i<$('#allvalue').val();i++)
				{
					if($('#chk_'+i).is(':checked'))
					{
						k++;
					}
				}

				if(k==0)
				{
					alert('Please select at least one checkbox');
					return false;
				}
			}

			var dataTable = $('#synopsis-data').DataTable({
				'processing':true,
				'serverSide':true,
				'order':[],
				'ajax':{
					url:'<?php echo base_url('index.php/Synopsis/GetSynopsisByOperatorAllInfo'); ?>',
					type:'POST'
				},
				'dataType':'json',
				'columnDefs':[
					{
						'targets':[0, 1, 2, 3, 4],
						'orderable':false
					},
				],
			});

			// $(document).on('click', '.delete', function(){
			// 	var companyId = $(this).attr('id');

			// 	if (confirm("Wait!, Are Your 100% Sure, You Really Want to Delete This?"))
			// 	{
			// 		$.ajax({
			// 			url:'<?php echo base_url('index.php/Company/DeleteCompany'); ?>',
			// 			method:'POST',
			// 			data:{companyId:companyId},
			// 			success:function(data){
			// 				alert(data);
			// 				dataTable.ajax.reload();
			// 			}
			// 		});
			// 	}
			// 	else
			// 	{
			// 		return false;
			// 	}
			// });
		</script>
	</body>
</html>
