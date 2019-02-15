<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include APPPATH.'views/admin/master/header.php'; ?>
	</head>
	
	<body>
		<?php include APPPATH.'views/admin/master/navbar.php'; ?>

		<?php include APPPATH.'views/admin/master/system-sub-navbar.php'; ?>
		
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
									<h3>Data Entry<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;News Entry<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create News</h3>
								</div>
								<!-- /widget-header -->
							</div> <!-- /widget -->
						</div>	<!-- /span12 -->
					<form id="news-entry-form" method="POST" action="<?= base_url('index.php/NewsEntry/CreateNews'); ?>">
						<table class="table table-striped table-bordered">
							<caption><h1>Data Entry</h1></caption>

							<thead>
								<th>Date</th>
								<th>Batch ID</th>
								<th>Media</th>
								<th>Publication</th>
							</thead>

							<tbody>
								<tr>
									<td>
										<input class="date-picker" type="text" name="date">
									</td>

									<td>
										<input type="text" id="batch-id" name="batch-id" value="">
									</td>

									<td>
										<div id="media-select-menu"></div>
									</td>

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

						<table class="table table-striped table-bordered">
							<caption><h1>Data Entry Details</h1></caption>
							<thead>
								<th>Sl</th>
								<th>Caption</th>
								<th>News Type</th>
								<th>News Category</th>
								<th>Page Name</th>
								<th>Page No.</th>
								<th>Position</th>
								<th>Hue</th>
								<th>Product</th>
								<th colspan="3">Column X Inch</th>
								<th>Sub Brand</th>
								<th>Keyword</th>
								<th>Image</th>
							</thead>

							<tbody>
								<tr>
									<td>1</td>

									<td>
										<input type="text" id="ded-input" name="caption" value="">
									</td>

									<td>
										<div id="news-type-select-menu"></div>
									</td>

									<td>
										<div id="news-category-select-menu"></div>
									</td>

									<td>
										<div id="page-select-menu"></div>										
									</td>

									<td>
										<select id="ded-select" name="page-no">
											<option value="">Select</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>										
									</td>

									<td>										
										<input type="text" id="ded-pos-input" name="position" value="">
									</td>

									<td>
										<div id="hue-select-menu"></div>									
									</td>

									<td>
										<div id="product-select-menu"></div>										
									</td>

									<td>
										<input type="text" id="ded-col-input" name="col" value="">
									</td>

									<td>X</td>

									<td>
										<input type="text" id="ded-inch-input" name="inch" value="">
									</td>

									<td>
										<div id="sub-brand-select-menu"></div>										
									</td>

									<td>
										<div id="keyword-select-menu"></div>										
									</td>

									<td>
										<input type="file" id="ded-input" name="image">
									</td>
								</tr>
							</tbody>

							<tfoot>
								<tr>
									<td colspan="15">
										<button onclick="return addRow();" class="btn btn-primary">Add More</button>
										<button onclick="return remove();" class="btn btn-danger">Remove</button>

										<button type="submit" id="button-price" name="button-price" class="btn btn-primary" onclick="return Validation()">Create Keyword</button>
										<input type="text" name="sl" id="sl" value="1">
									</td>
								</tr>
							</tfoot>
						</table>
					</form>
					</div>	<!-- /row --> 
					<!-- <input type="number" name="sl" id="sl" value="1" hidden>  -->
				</div>	<!-- /container --> 
			</div>	<!-- /main-inner --> 
		</div>	<!-- /main -->

		<?php include APPPATH.'views/admin/master/footer.php'; ?>

		<!-- Custome JS File Include -->
		<script type="text/javascript">
			function addRow(){
				var sl = document.getElementById('sl').value;
				sl++;

				document.getElementById("sl").value = sl;

				var table = document.getElementsByTagName('table')[1];

				var newRow = table.insertRow(sl);

				var cell1 = newRow.insertCell(0);
				var cell2 = newRow.insertCell(1);
				var cell3 = newRow.insertCell(2);
				var cell4 = newRow.insertCell(3);
				var cell5 = newRow.insertCell(4);
				var cell6 = newRow.insertCell(5);
				var cell7 = newRow.insertCell(6);
				var cell8 = newRow.insertCell(7);
				var cell9 = newRow.insertCell(8);
				var cell10 = newRow.insertCell(9);
				var cell11 = newRow.insertCell(10);
				var cell12 = newRow.insertCell(11);
				var cell13 = newRow.insertCell(12);
				var cell14 = newRow.insertCell(13);
				var cell15 = newRow.insertCell(14);

				cell1.innerHTML = sl;
				cell2.innerHTML = '<input type="text" id="ded-input" name="caption'+sl+'" value="">';
				cell3.innerHTML = '<select id="ded-select" name="news-type'+sl+'"><option value="">Select</option><option value="Editorial">Editorial</option><option value="Post Editorial">Post Editorial</option><option value="Features">Features</option><option value="News">News</option></select>';
				cell4.innerHTML = '<select id="ded-select" name="news-category'+sl+'"><option value="">Select</option><option value="Negetive">Negetive</option><option value="Normal">Normal</option><option value="Positive">Positive</option></select>';
				cell5.innerHTML = '<select id="ded-select" name="page-name'+sl+'"><option value="">Select</option><option value="2nd Cover Page">2nd Cover Page</option><option value="3rd Cover Page">3rd Cover Page</option><option value="5th Page">5th Page</option><option value="7th Page">7th Page</option><option value="9th Page">9th Page</option></select>';
				cell6.innerHTML = '<select id="ded-select" name="page-no'+sl+'"><option value="">Select</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>';
				cell7.innerHTML = '<input type="text" id="ded-pos-input" name="position'+sl+'" value="">';
				cell8.innerHTML = '<select id="ded-select" name="hue'+sl+'"><option value="">Select</option><option value="Black & White">Black & White</option><option value="Color">Color</option></select>';
				cell9.innerHTML = '<select id="ded-select" name="product'+sl+'"><option value="">Select</option><option value="Achar">Achar</option><option value="Adhesive">Adhesive</option><option value="Aerosol">Aerosol</option><option value="Agent Banking">Agent Banking</option><option value="Air Compressor">Air Compressor</option></select>';
				cell10.innerHTML = '<input type="text" id="ded-col-input" name="col'+sl+'" value="">';
				cell11.innerHTML = 'X';
				cell12.innerHTML = '<input type="text" id="ded-inch-input" name="inch'+sl+'" value="">';
				cell13.innerHTML = '<select id="ded-select" name="sub-brand'+sl+'"><option value="">Select</option><option value="Fram Fresh Milk">Farm Fresh Milk</option><option value="7UP">7UP</option><option value="Amra IT">Amra IT</option><option value="Agent Banking">Agent Banking</option><option value="Air Compressor">Air Compressor</option></select>';
				cell14.innerHTML = '<select name="keyword'+sl+'"><option value="ACI">ACI</option><option value="Anwar Group">Anwar Group</option><option value="Bata">Bata</option><option value="Barger">Berger</option><option value="Bikroy.com">Bikroy.com</option></select>';
				cell15.innerHTML = '<input type="file" id="ded-input" name="image'+sl+'">';

				return false;
			}

			function remove(sl){
				var index, table, sl;
				sl = document.getElementById('sl').value;

				if (sl == 1) {
					window.alert("You Can't Delete Last Row Of The Table");
				}
				else {
					table = document.getElementsByTagName('table')[1];
					table.deleteRow(sl);
					sl--;
					document.getElementById("sl").value = sl;
				}

				return false;
			}
			
			$(document).ready(function(){
				$(".chosen-select").chosen({
					width: "80px"
				});
			});
			
			$(function(){
				$('.date-picker').datepicker();
			});


			GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu","media-name-id","Select Media",0);
			GetDataForSelectMenu("NewsTypeModel","GetAllNewsType","#news-type-select-menu","news-type-id","Select",0);
			GetDataForSelectMenu("NewsCategoryModel","GetAllNewsCategory","#news-category-select-menu","news-category-id","Select",0);
			GetDataForSelectMenu("PageModel","GetAllPage","#page-select-menu","page-id","Select",0);
			GetDataForSelectMenu("HueModel","GetAllHue","#hue-select-menu","hue-id","Select",0);
			GetDataForSelectMenu("ProductModel","GetAllProduct","#product-select-menu","product-id","Select",0);
			GetDataForSelectMenu("SubBrandModel","GetAllSubBrand","#sub-brand-select-menu","sub-brand-id","Select",0);
			GetDataForSelectMenu("KeywordModel","GetAllKeyword","#keyword-select-menu","keyword-id","Select",0);

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

			function Validation()
			{
				var priceMediaName = $('#price-media-name').val();
				var mediaId = $('#media-name-id').val();
				var publicationId = $('#publication-id').val();
				var day = $('#day').val();

				var totalRow = $('#sl').val();

				if (mediaId == "")
				{
					alert("Media Name Can't Be Empty");
					return false;
				}

				if (publicationId == "")
				{
					alert("Publication Can't Be Empty");
					return false;
				}

				if (day == "")
				{
					alert("Day Can't Be Empty");
					return false;
				}

				for (var i = 1; i <= totalRow; i++)
				{
					var priceTitleIdAttr = "#price-title-"+i;
					var pageIdAttr = "#page-id-"+i;
					var hueIdAttr = "#hue-id-"+i;
					var colIdAttr = "#col-"+i;
					var inchIdAttr = "#inch-"+i;
					var priceIdAttr = "#price-"+i;

					if ($(priceTitleIdAttr).val() == "")
					{
						alert("In Row "+i+", Price Title Can't be Empty");
						return false;
					}

					if ($(pageIdAttr).val() == "")
					{
						alert("In Row "+i+", Page Name Can't Be Empty.");
						return false;
					}

					if ($(hueIdAttr).val() == "")
					{
						alert("In Row "+i+", Hue Can't Be Empty");
						return false;
					}

					if ($(colIdAttr).val() == "")
					{
						alert("In Row "+i+", Column Can't be Empty");
						return false;
					}

					if ($(inchIdAttr).val() == "")
					{
						alert("In Row "+i+", Inch Can't be Empty");
						return false;
					}

					if ($(priceIdAttr).val() == "")
					{
						alert("In Row "+i+", Price Can't be Enpty");
						return false;
					}
				}
			}
		</script>
	</body>
</html>
