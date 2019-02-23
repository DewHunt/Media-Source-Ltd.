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
								</div>	<!-- /widget-header -->
							</div> <!-- /widget -->
						</div>	<!-- /span12 -->

						<form id="news-entry-form" method="POST" action="<?= base_url('index.php/NewsEntry/CreateNews'); ?>" enctype="multipart/form-data">
							<table class="table table-striped table-bordered">
								<caption><h1>Data Entry</h1></caption>

								<thead>
									<th>Date&nbsp;<span class="mendatory">*</span></th>
									<th>Batch ID</th>
									<th>Media&nbsp;<span class="mendatory">*</span></th>
									<th>Publication&nbsp;<span class="mendatory">*</span></th>
								</thead>

								<tbody>
									<tr>
										<td>
											<input class="date-picker" type="text" id="date" name="date" placeholder="Select Date (M/D/Y)">
										</td>

										<td>
											<input type="text" id="batch-id" name="batch-id" value="<?= $batchId; ?>" readonly>
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

							<table class="table-striped table-bordered" width="100%">
								<caption><h1>Data Entry Details</h1></caption>
								<thead>
									<th>Sl</th>
									<th>Caption&nbsp;<span class="mendatory">*</span></th>
									<th>News Type&nbsp;<span class="mendatory">*</span></th>
									<th>News Category&nbsp;<span class="mendatory">*</span></th>
									<th>Page Name&nbsp;<span class="mendatory">*</span></th>
									<th>Page No.&nbsp;<span class="mendatory">*</span></th>
									<th>Position&nbsp;<span class="mendatory">*</span></th>
									<th>Hue&nbsp;<span class="mendatory">*</span></th>
									<th>Product&nbsp;<span class="mendatory">*</span></th>
									<th colspan="3">Column X Inch&nbsp;<span class="mendatory">*</span></th>
									<th>Sub Brand&nbsp;<span class="mendatory">*</span></th>
									<th>Keyword&nbsp;<span class="mendatory">*</span></th>
									<th>Image</th>
								</thead>

								<tbody>
									<tr>
										<td>1</td>

										<td>
											<input type="text" class="ded-input" id="caption-1" name="caption-1" value="">
										</td>

										<td>
											<div id="news-type-select-menu-1"></div>
										</td>

										<td>
											<div id="news-category-select-menu-1"></div>
										</td>

										<td>
											<div id="page-select-menu-1"></div>
										</td>

										<td>
											<input type="text" class="ded-pos-input" id="page-no-1" name="page-no-1" value="">
										</td>

										<td>										
											<input type="text" class="ded-pos-input" id="position-1" name="position-1" value="">
										</td>

										<td>
											<div id="hue-select-menu-1"></div>									
										</td>

										<td>
											<div id="product-select-menu-1"></div>
										</td>

										<td>
											<input type="text" class="ded-col-input" id="col-1" name="col-1" value="">
										</td>

										<td>X</td>

										<td>
											<input type="text" class="ded-inch-input" id="inch-1" name="inch-1" value="">
										</td>

										<td>
											<div id="sub-brand-select-menu-1"></div>
										</td>

										<td>
											<div id="keyword-select-menu-1"></div>
										</td>

										<td>
											<input type="file" class="ded-file-input" id="image-1" name="image-1">
										</td>
									</tr>
								</tbody>

								<tfoot>
									<tr>
										<td colspan="15">
											<button onclick="return addRow();" class="btn btn-primary">Add More</button>
											<button onclick="return remove();" class="btn btn-danger">Remove</button>

											<button type="submit" id="button-news-entry" name="button-news-entry" class="btn btn-primary" onclick="return Validation()">Create News Entry</button>
											<input type="hidden" name="sl" id="sl" value="1">
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

				var newsTypeSelectMenu = "#news-type-select-menu-"+sl;
				var newsCategorySelectMenu = "#news-category-select-menu-"+sl;
				var pageSelectMenu = "#page-select-menu-"+sl;
				var hueSelectMenu = "#hue-select-menu-"+sl;
				var productSelectMenu = "#product-select-menu-"+sl;
				var subBrandSelectMenu = "#sub-brand-select-menu-"+sl;
				var keywordSelectMenu = "#keyword-select-menu-"+sl;

				var newsTypeIdNameAttr = "news-type-id-"+sl;
				var newsCategoryIdNameAttr = "news-category-id-"+sl;
				var pageIdNameAttr = "page-id-"+sl;
				var hueIdNameAttr = "hue-id-"+sl;
				var productIdNameAttr = "product-id-"+sl;
				var subBrandIdNameAttr = "sub-brand-id-"+sl;
				var keywordIdNameAttr = "keyword-id-"+sl;

				GetDataForSelectMenu("NewsTypeModel","GetAllNewsType",newsTypeSelectMenu,newsTypeIdNameAttr,"Select",0);
				GetDataForSelectMenu("NewsCategoryModel","GetAllNewsCategory",newsCategorySelectMenu,newsCategoryIdNameAttr,"Select",0);
				GetDataForSelectMenu("PageModel","GetAllPage",pageSelectMenu,pageIdNameAttr,"Select",0);
				GetDataForSelectMenu("HueModel","GetAllHue",hueSelectMenu,hueIdNameAttr,"Select",0);
				GetDataForSelectMenu("ProductModel","GetAllProduct",productSelectMenu,productIdNameAttr,"Select",0);
				GetDataForSelectMenu("SubBrandModel","GetAllSubBrand",subBrandSelectMenu,subBrandIdNameAttr,"Select",0);
				GetDataForSelectMenu("KeywordModel","GetAllKeyword",keywordSelectMenu,keywordIdNameAttr,"Select",0);

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
				cell2.innerHTML = '<input type="text" class="ded-input" id="caption-'+sl+'" name="caption-'+sl+'" value="">';
				cell3.innerHTML = '<div id="news-type-select-menu-'+sl+'"></div>';
				cell4.innerHTML = '<div id="news-category-select-menu-'+sl+'"></div>';
				cell5.innerHTML = '<div id="page-select-menu-'+sl+'"></div>';
				cell6.innerHTML = '<input type="text" class="ded-pos-input" id="page-no-'+sl+'" name="page-no-'+sl+'" value="">';
				cell7.innerHTML = '<input type="text" class="ded-pos-input" id="position-'+sl+'" name="position-'+sl+'" value="">';
				cell8.innerHTML = '<div id="hue-select-menu-'+sl+'"></div>';
				cell9.innerHTML = '<div id="product-select-menu-'+sl+'"></div>';
				cell10.innerHTML = '<input type="text" class="ded-col-input" id="col-'+sl+'" name="col-'+sl+'" value="">';
				cell11.innerHTML = 'X';
				cell12.innerHTML = '<input type="text" class="ded-inch-input" id="inch-'+sl+'" name="inch-'+sl+'" value="">';
				cell13.innerHTML = '<div id="sub-brand-select-menu-'+sl+'"></div>';
				cell14.innerHTML = '<div id="keyword-select-menu-'+sl+'"></div>';
				cell15.innerHTML = '<input type="file" class="ded-input" id="image-'+sl+'" name="image-'+sl+'">';

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
			GetDataForSelectMenu("NewsTypeModel","GetAllNewsType","#news-type-select-menu-1","news-type-id-1","Select",0);
			GetDataForSelectMenu("NewsCategoryModel","GetAllNewsCategory","#news-category-select-menu-1","news-category-id-1","Select",0);
			GetDataForSelectMenu("PageModel","GetAllPage","#page-select-menu-1","page-id-1","Select",0);
			GetDataForSelectMenu("HueModel","GetAllHue","#hue-select-menu-1","hue-id-1","Select",0);
			GetDataForSelectMenu("ProductModel","GetAllProduct","#product-select-menu-1","product-id-1","Select",0);
			GetDataForSelectMenu("SubBrandModel","GetAllSubBrand","#sub-brand-select-menu-1","sub-brand-id-1","Select",0);
			GetDataForSelectMenu("KeywordModel","GetAllKeyword","#keyword-select-menu-1","keyword-id-1","Select",0);

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
				var date = $('#date').val();
				var mediaId = $('#media-name-id').val();
				var publicationId = $('#publication-id').val();

				var totalRow = $('#sl').val();

				if (date == 0)
				{
					alert("Date Can't Be Empty");
					$('#date').focus();
					return false;
				}

				if (mediaId == 0)
				{
					alert("Media Name Can't Be Empty");
					$('#media-name-id').focus();
					return false;
				}

				if (publicationId == 0)
				{
					alert("Publication Can't Be Empty");
					$('#publication-id').focus();
					return false;
				}

				for (var i = 1; i <= totalRow; i++)
				{
					var captionIdAttr = "#caption-"+i;
					var newsTypeIdAttr = "#news-type-id-"+i;
					var newsCategoryIdAttr = "#news-category-id-"+i;
					var pageNameIdAttr = "#page-id-"+i;
					var pageNoIdAttr = "#page-no-"+i;
					var positionIdAttr = "#position-"+i;
					var hueIdAttr = "#hue-id-"+i;
					var productIdAttr = "#product-id-"+i;
					var colIdAttr = "#col-"+i;
					var inchIdAttr = "#inch-"+i;
					var subBrandIdAttr = "#sub-brand-id-"+i;
					var keywordIdAttr = "#keyword-id-"+i;

					if ($(captionIdAttr).val() == "")
					{
						alert("In Row "+i+", Caption Can't be Empty");
						$(captionIdAttr).focus();
						return false;
					}

					if ($(newsTypeIdAttr).val() == "")
					{
						alert("In Row "+i+", News Type Can't Be Empty.");
						$(newsTypeIdAttr).focus();
						return false;
					}

					if ($(newsCategoryIdAttr).val() == "")
					{
						alert("In Row "+i+", News Category Can't Be Empty");
						$(newsCategoryIdAttr).focus();
						return false;
					}

					if ($(pageNameIdAttr).val() == "")
					{
						alert("In Row "+i+", Page Name Can't be Empty");
						$(pageNameIdAttr).focus();
						return false;
					}

					if ($(positionIdAttr).val() == "")
					{
						alert("In Row "+i+", Position Can't be Empty");
						$(positionIdAttr).focus();
						return false;
					}

					if ($(hueIdAttr).val() == "")
					{
						alert("In Row "+i+", Hue Can't be Enpty");
						$(hueIdAttr).focus();
						return false;
					}

					if ($(productIdAttr).val() == "")
					{
						alert("In Row "+i+", Product Can't be Enpty");
						$(productIdAttr).focus();
						return false;
					}

					if ($(colIdAttr).val() == "")
					{
						alert("In Row "+i+",  Column be Enpty");
						$(colIdAttr).focus();
						return false;
					}

					if ($(inchIdAttr).val() == "")
					{
						alert("In Row "+i+", Inch Can't be Enpty");
						$(inchIdAttr).focus();
						return false;
					}

					if ($(subBrandIdAttr).val() == "")
					{
						alert("In Row "+i+", Sub Brand Can't be Enpty");
						$(subBrandIdAttr).focus();
						return false;
					}

					if ($(keywordIdAttr).val() == "")
					{
						alert("In Row "+i+", Keyword Can't be Enpty");
						$(keywordIdAttr).focus();
						return false;
					}
				}
			}
		</script>
	</body>
</html>
