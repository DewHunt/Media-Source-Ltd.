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
								if ($message == 2)
								{
							?>
									<div class="alert alert-info error-message">
										<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/NewsEntry/Update/_/'.$dataEntryInfo->Id); ?>">&times;</a>
										<strong>Oops! Sorry,</strong> Your News Entry Can't Be Updated...
									</div>
							<?php
								}
							?>
							<div class="widget">
								<div class="widget-header">
									<i class="icon-tag"></i>
									<h3>Data Entry<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;News Entry<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Update News Entry</h3>
								</div>	<!-- /widget-header -->
							</div> <!-- /widget -->
						</div>	<!-- /span12 -->
						<form id="news-entry-form" method="POST" action="<?= base_url('index.php/NewsEntry/UpdateNews'); ?>" enctype="multipart/form-data">
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
											<input class="date-picker" type="text" id="date" name="date" placeholder="Select Date (M/D/Y)">
										</td>

										<td>
											<input type="text" id="batch-id" name="batch-id" value="<?= $dataEntryInfo->BatchId; ?>" readonly>
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
									<?php
										$sl = 1;
										foreach ($dataEntryDetailsInfo as $value)
										{
									?>
										<tr>
											<td><?= $sl; ?></td>

											<td>
												<input type="text" class="ded-input" id="caption-1" name="caption-1" value="<?= $value->Caption; ?>">
											</td>

											<td>
												<?php
													$newsTypeInfo = $this->NewsTypeModel->GetAllNewsType();
													$output = '';

													$output .= '<select class="dropdown" name="news-type-id-'.$sl.'" id="news-type-id-'.$sl.'" style="width: 99%;">';
													$output .= '<option value="">Select</option>';
													if ($newsTypeInfo)
													{
														foreach ($newsTypeInfo as $data)
														{
															if ($value->NewstypeId == $data->Id)
															{
																$output .= '<option value="'.$data->Id.'" selected>'.$data->Name.'</option>';
															}
															else
															{
																$output .= '<option value="'.$data->Id.'">'.$data->Name.'</option>';
															}
														}
														$output .= '</select>';
													}
													else
													{
														$output .= '<option value="">Data Option Not Found</option>';	
													}
													$output .= '</select>';

													echo $output;
												?>
											</td>

											<td>
												<?php
													$newsCategoryInfo = $this->NewsCategoryModel->GetAllNewsCategory();
													$output = '';

													$output .= '<select class="dropdown" name="news-category-id-'.$sl.'" id="news-category-id-'.$sl.'" style="width: 99%;">';
													$output .= '<option value="">Select</option>';
													if ($newsCategoryInfo)
													{
														foreach ($newsCategoryInfo as $data)
														{
															if ($value->outlook == $data->Id)
															{
																$output .= '<option value="'.$data->Id.'" selected>'.$data->Name.'</option>';
															}
															else
															{
																$output .= '<option value="'.$data->Id.'">'.$data->Name.'</option>';
															}
														}
														$output .= '</select>';
													}
													else
													{
														$output .= '<option value="">Data Option Not Found</option>';		
													}
													$output .= '</select>';	

													echo $output;
												?>
											</td>

											<td>
												<?php
													$pageInfo = $this->PageModel->GetAllPage();
													$output = '';

													$output .= '<select class="dropdown" name="page-id-'.$sl.'" id="page-id-'.$sl.'" style="width: 99%;">';
													$output .= '<option value="">Select</option>';
													if ($pageInfo)
													{
														foreach ($pageInfo as $data)
														{
															if ($value->PageId == $data->Id)
															{
																$output .= '<option value="'.$data->Id.'" selected>'.$data->Name.'</option>';
															}
															else
															{
																$output .= '<option value="'.$data->Id.'">'.$data->Name.'</option>';
															}
														}
														$output .= '</select>';
													}
													else
													{
														$output .= '<option value="">Data Option Not Found</option>';		
													}

													echo $output;
												?>
											</td>

											<td>
												<input type="text" class="ded-pos-input" id="page-no-<?= $sl; ?>" name="page-no-<?= $sl; ?>" value="<?= $value->PageNo; ?>">
											</td>

											<td>										
												<input type="text" class="ded-pos-input" id="position-<?= $sl; ?>" name="position-<?= $sl; ?>" value="<?= $value->PositionName; ?>">
											</td>

											<td>
												<?php
													$hueInfo = $this->HueModel->GetAllHue();
													$output = '';

													$output .= '<select class="dropdown" name="hue-id-'.$sl.'" id="hue-id-'.$sl.'" style="width: 99%;">';
													$output .= '<option value="">Select</option>';
													if ($hueInfo)
													{
														foreach ($hueInfo as $data)
														{
															if ($value->HueId == $data->Id)
															{
																$output .= '<option value="'.$data->Id.'" selected>'.$data->Name.'</option>';
															}
															else
															{
																$output .= '<option value="'.$data->Id.'">'.$data->Name.'</option>';
															}
														}
													}
													else
													{
														$output .= '<option value="">Data Option Not Found</option>';		
													}
													$output .= '</select>';		

													echo $output;
												?>								
											</td>

											<td>
												<?php
													$productInfo = $this->ProductModel->GetAllProduct();
													$output = '';

													$output .= '<select class="dropdown" name="product-id-'.$sl.'" id="product-id-'.$sl.'" style="width: 99%;">';
													$output .= '<option value="">Select</option>';
													if ($productInfo)
													{
														foreach ($productInfo as $data)
														{
															if ($value->ProductId == $data->Id)
															{
																$output .= '<option value="'.$data->Id.'" selected>'.$data->Name.'</option>';
															}
															else
															{
																$output .= '<option value="'.$data->Id.'">'.$data->Name.'</option>';
															}
														}
													}
													else
													{
														$output .= '<option value="">Data Option Not Found</option>';		
													}
													$output .= '</select>';		

													echo $output;
												?>
											</td>

											<td>
												<input type="text" class="ded-col-input" id="col-<?= $sl; ?>" name="col-<?= $sl; ?>" value="<?= $value->Cols; ?>">
											</td>

											<td>X</td>

											<td>
												<input type="text" class="ded-inch-input" id="inch-<?= $sl; ?>" name="inch-<?= $sl; ?>" value="<?= $value->Inchs; ?>">
											</td>

											<td>
												<?php
													$subBrandInfo = $this->SubBrandModel->GetAllSubBrand();
													$output = '';

													$output .= '<select class="dropdown" name="sub-brand-id-'.$sl.'" id="sub-brand-id-'.$sl.'" style="width: 99%;">';
													$output .= '<option value="">Select</option>';
													if ($subBrandInfo)
													{
														foreach ($subBrandInfo as $data)
														{
															if ($value->subBrandId == $data->Id)
															{
																$output .= '<option value="'.$data->Id.'" selected>'.$data->Name.'</option>';
															}
															else
															{
																$output .= '<option value="'.$data->Id.'">'.$data->Name.'</option>';
															}
														}
													}
													else
													{
														$output .= '<option value="">Data Option Not Found</option>';		
													}
													$output .= '</select>';		

													echo $output;
												?>
											</td>

											<td>
												<?php
													$keywordInfo = $this->KeywordModel->GetAllKeyword();
													$output = '';

													$output .= '<select class="dropdown" name="keyword-id-'.$sl.'" id="keyword-id-'.$sl.'" style="width: 99%;">';
													$output .= '<option value="">Select</option>';
													if ($keywordInfo)
													{
														foreach ($keywordInfo as $data)
														{
															if ($value->KeywordId == $data->Id)
															{
																$output .= '<option value="'.$data->Id.'" selected>'.$data->Name.'</option>';
															}
															else
															{
																$output .= '<option value="'.$data->Id.'">'.$data->Name.'</option>';
															}
														}
													}
													else
													{
														$output .= '<option value="">Data Option Not Found</option>';		
													}
													$output .= '</select>';		

													echo $output;
												?>
											</td>

											<td>
												<input type="file" class="ded-file-input" id="image-<?= $sl; ?>" name="image-<?= $sl; ?>">
												<?php
													$output = '';
													if ($value->Image == "")
													{
														$output .= '<input type="text" name="previous-image-'.$sl.'" id="previous-image-'.$sl.'" value="">';
													}
													else
													{
														$output .= '<img src="'.base_url("images/").$value->Image.'" class="img-thumbnail" width="50px" height="50px"> <input type="text" name="previous-image-'.$sl.'" id="previous-image-'.$sl.'" value="'.$value->Image.'">';
													}
													echo $output;
												?>
											</td>
										</tr>											
									<?php
											$sl++;
										}
									?>
								</tbody>

								<tfoot>
									<tr>
										<td colspan="15">
											<button onclick="return addRow();" class="btn btn-primary">Add More</button>
											<button onclick="return remove();" class="btn btn-danger">Remove</button>

											<button type="submit" id="button-news-entry" name="button-news-entry" class="btn btn-primary" onclick="return Validation()">Update News Entry</button>
											<input type="text" name="sl" id="sl" value="<?= $sl-1; ?>">
											<input type="text" name="date-entry-id" id="date-entry-id" value="<?= $dataEntryInfo->Id; ?>">
										</td>
									</tr>
								</tfoot>
							</table>
						</form>
					</div>
					<!-- /row --> 
				</div>
				<!-- /container --> 
			</div>
			<!-- /main-inner --> 
		</div>
		<!-- /main -->

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

			GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu","media-name-id","Select Media",<?= $dataEntryInfo->MediaId;?>);

			GetDataForDependantSelectMenu("PublicationModel","GetPublicationByForignKey","MediaId",<?= $dataEntryInfo->MediaId?>,"#publication-select-menu","publication-id","Select Publication",<?= $dataEntryInfo->PublicationId;?>);

			// Get All Data For Select Menu Script Start
			$(document).on('change', '#media-name-id', function(){
				var id = $('#media-name-id').val();
				GetDataForDependantSelectMenu("PublicationModel","GetPublicationByForignKey","MediaId",id,"#publication-select-menu","publication-id","Select Publication",0);
			});

			function GetDataForSelectMenu(modelName,methodName,divId,idNameAttr,selectHeader,selectId)
			{
				$.ajax({
					type:'ajax',
					url:'<?php echo base_url('index.php/SelectMenu/GetDataForSelectMenu'); ?>',
					method:'POST',
					data:{modelName:modelName,methodName:methodName,idNameAttr:idNameAttr,selectHeader:selectHeader,selectId:selectId},
					success:function(data){
						$(divId).html(data);
					}
				});
			} 

			function GetDataForDependantSelectMenu(modelName,methodName,fieldName,id,divId,idNameAttr,selectHeader,selectId)
			{
				$.ajax({
					type:'ajax',
					url:'<?php echo base_url('index.php/SelectMenu/GetDataForDependantSelectMenu'); ?>',
					method:'POST',
					data:{modelName:modelName,methodName:methodName,fieldName:fieldName,id:id,idNameAttr:idNameAttr,selectHeader:selectHeader,selectId:selectId},
					success:function(data){
						$(divId).html(data);
					}
				});
			} 
			// Get All Data For Select Menu Script End

			// function Validation()
			// {
			// 	var priceMediaName = $('#price-media-name').val();
			// 	var mediaId = $('#media-name-id').val();
			// 	var publicationId = $('#publication-id').val();
			// 	var day = $('#day').val();

			// 	var totalRow = $('#sl').val();

			// 	if (mediaId == "")
			// 	{
			// 		alert("Media Name Can't Be Empty");
			// 		return false;
			// 	}

			// 	if (publicationId == "")
			// 	{
			// 		alert("Publication Can't Be Empty");
			// 		return false;
			// 	}

			// 	if (day == "")
			// 	{
			// 		alert("Day Can't Be Empty");
			// 		return false;
			// 	}

			// 	for (var i = 1; i <= totalRow; i++)
			// 	{
			// 		var priceTitleIdAttr = "#price-title-"+i;
			// 		var pageIdAttr = "#page-id-"+i;
			// 		var hueIdAttr = "#hue-id-"+i;
			// 		var colIdAttr = "#col-"+i;
			// 		var inchIdAttr = "#inch-"+i;
			// 		var priceIdAttr = "#price-"+i;

			// 		if ($(priceTitleIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Price Title Can't be Empty");
			// 			return false;
			// 		}

			// 		if ($(pageIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Page Name Can't Be Empty.");
			// 			return false;
			// 		}

			// 		if ($(hueIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Hue Can't Be Empty");
			// 			return false;
			// 		}

			// 		if ($(colIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Column Can't be Empty");
			// 			return false;
			// 		}

			// 		if ($(inchIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Inch Can't be Empty");
			// 			return false;
			// 		}

			// 		if ($(priceIdAttr).val() == "")
			// 		{
			// 			alert("In Row "+i+", Price Can't be Enpty");
			// 			return false;
			// 		}
			// 	}
			// }
		</script>
	</body>
</html>
