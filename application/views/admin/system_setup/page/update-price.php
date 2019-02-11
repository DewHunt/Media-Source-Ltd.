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
						<form class="form-horizontal" id="price-form" method="POST" action="<?= base_url('index.php/Price/UpdatePrice'); ?>">
							<div class="span12">

								<?php
									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Price/Update/_/'.$priceInfo->Id); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Price Can't Be Updated...
										</div>
								<?php
									}
								?>
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Page Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Price<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Price</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">											
												<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
												<div class="controls">
													<input type="text" class="span10" id="price-media-name" name="price-media-name" value="<?= $priceInfo->Name; ?>">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->

											<div class="control-group">                     
												<label class="control-label" for="media"><span class="mendatory">*</span>&nbsp;Media</label>
												<div class="controls">
													<div id="media-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="publication"><span class="mendatory">*</span>&nbsp;Publication</label>
												<div class="controls">
													<div id="publication-select-menu">
														<select class="dropdown" name="publication-id" id="publication-id" style="width: 99%;">
															<option value="">Select Publication</option>
														</select>
													</div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="day"><span class="mendatory">*</span>&nbsp;Day</label>
												<div class="controls">
													<select class="dropdown" name="day", id="day" style="width: 99%;">
														<option value="">Select Day</option>
														<option value="All Days">All Days</option>
														<option value="Saturday">Saturday</option>
														<option value="Sunday">Sunday</option>
														<option value="Monday">Monday</option>
														<option value="Tuesday">Tuesday</option>
														<option value="Wednesday">Wednesday</option>
														<option value="Thursday">Thursday</option>
														<option value="Friday">Friday</option>
														<option value="Weekly">Weekly</option>
														<option value="Monthly">Monthly</option>
														<option value="Yearly">Yearly</option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="price-details">Price Details</label>
												<div class="controls">
													<table class="table table-striped table-bordered table-responsive">
														<thead>
															<tr>
																<th>SL</th>
																<th><span class="mendatory">*</span>&nbsp;Price Title</th>
																<th><span class="mendatory">*</span>&nbsp;Select Pages</th>
																<th><span class="mendatory">*</span>&nbsp;Hue</th>
																<th><span class="mendatory">*</span>&nbsp;Column</th>
																<th>×</th>
																<th><span class="mendatory">*</span>&nbsp;Inch</th>
																<th><span class="mendatory">*</span>&nbsp;Price</th>
																<th>Remarks</th>
															</tr>
														</thead>
														<tbody>
															<?php
																$sl = 1;
																foreach ($priceDetailsInfo as $value)
																{
															?>
																<tr>
																	<td><?= $sl; ?></td>
																	<td>
																		<input type="text" class="span2" id="price-title-<?= $sl; ?>" name="price-title-<?= $sl; ?>" value="<?= $value->Name; ?>">
																	</td>
																	<td>
																		<?php
																			$pageInfo = $this->PageModel->GetAllPage();
																			$output = '';

																			if ($pageInfo)
																			{
																				$output .= '<select class="dropdown" name="page-id-'.$sl.'" id="page-id-'.$sl.'" style="width: 99%;">';
																				$output .= '<option value="">Select Page</option>';
																				foreach ($pageInfo as $data)
																				{
																					if ($value->PageNoId == $data->Id)
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
																				$output .= '<select class="dropdown" name="page-id-'.$sl.'" id="page-id-'.$sl.'" disable style="width: 99%;">';
																				$output .= '<option value="">Data Option Not Found</option>';
																				$output .= '</select>';				
																			}

																			echo $output;
																		?>
																	</td>
																	<td>
																		<?php
																			$hueInfo = $this->HueModel->GetAllHue();
																			$output = '';

																			if ($hueInfo)
																			{
																				$output .= '<select class="dropdown" name="hue-id-'.$sl.'" id="hue-id-'.$sl.'" style="width: 99%;">';
																				$output .= '<option value="">Select Page</option>';
																				foreach ($hueInfo as $data)
																				{
																					if ($value->Hue == $data->Id)
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
																				$output .= '<select class="dropdown" name="hue-id-'.$sl.'" id="hue-id-'.$sl.'" disable style="width: 99%;">';
																				$output .= '<option value="">Data Option Not Found</option>';
																				$output .= '</select>';				
																			}

																			echo $output;
																		?>
																	</td>
																	<td>
																		<input type="text" class="span1" id="col-<?= $sl; ?>" name="col-<?= $sl; ?>" value="<?= $value->Col; ?>">
																	</td>
																	<td>×</td>
																	<td>
																		<input type="text" class="span1" id="inch-<?= $sl; ?>" name="inch-<?= $sl; ?>" value="<?= $value->Inch; ?>">
																	</td>
																	<td>
																		<input type="text" class="span1" id="price-<?= $sl; ?>" name="price-<?= $sl; ?>" value="<?= $value->Price; ?>">
																	</td>
																	<td>
																		<input type="text" class="span1" id="price-description-<?= $sl; ?>" name="price-description-<?= $sl; ?>" value="<?= $value->Description; ?>">
																	</td>
																</tr>
															<?php
																$sl++;
																}
															?>
														</tbody>
													</table>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button onclick="return addRow();" class="btn btn-primary">Add More</button>
												<button onclick="return remove();" class="btn btn-danger">Remove</button>

												<button type="submit" id="button-price" name="button-price" class="btn btn-primary" onclick="return Validation()">Update Price</button>
												<input type="hidden" name="sl" id="sl" value="<?= $sl-1; ?>">
												<input type="hidden" name="price-id" id="price-id" value="<?= $priceInfo->Id; ?>">
											</div> <!-- /form-actions -->
										</fieldset>
									</div> <!-- /widget-content -->
								</div> <!-- /widget -->
								<!-- /widget --> 
							</div>
							<!-- /span12 -->
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

				var pageSelectMenu = "#page-select-menu-"+sl;
				var hueSelectMenu = "#hue-select-menu-"+sl;

				var pageIdNameAttr = "page-id-"+sl;
				var hueIdNameAttr = "hue-id-"+sl;

				GetDataForSelectMenu("PageModel","GetAllPage",pageSelectMenu,pageIdNameAttr,"Select Page Name",0);
				GetDataForSelectMenu("HueModel","GetAllHue",hueSelectMenu,hueIdNameAttr,"Select Hue",0);

				document.getElementById("sl").value = sl;

				var table = document.getElementsByTagName('table')[0];

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

				cell1.innerHTML = sl;
				cell2.innerHTML = '<input type="text" class="span2" id="price-title-'+sl+'" name="price-title-'+sl+'" value="">';
				cell3.innerHTML = '<div id="page-select-menu-'+sl+'"></div>';
				cell4.innerHTML = '<div id="hue-select-menu-'+sl+'"></div>';
				cell5.innerHTML = '<input type="text" class="span1" id="col-'+sl+'" name="col-'+sl+'" value="1">';
				cell6.innerHTML = '×';
				cell7.innerHTML = '<input type="text" class="span1" id="inch-'+sl+'" name="inch-'+sl+'" value="1">';
				cell8.innerHTML = '<input type="text" class="span1" id="price-'+sl+'" name="price-'+sl+'" value="">';
				cell9.innerHTML = '<input type="text" class="span1" id="price-description-'+sl+'" name="price-description-'+sl+'" value="">';

				return false;
			}

			function remove(sl){
				var index, table, sl;
				sl = document.getElementById('sl').value;

				if (sl == 1)
				{
					window.alert("You Can't Delete Last Row Of The Table");
				}
				else
				{
					table = document.getElementsByTagName('table')[0];
					table.deleteRow(sl);
					sl--;
					document.getElementById("sl").value = sl;
				}

				return false;
			}

			GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu","media-name-id","Select Media",<?= $priceInfo->MediaId;?>);

			GetDataForDependantSelectMenu("PublicationModel","GetPublicationByForignKey","MediaId",<?= $priceInfo->MediaId?>,"#publication-select-menu","publication-id","Select Publication",<?= $priceInfo->PublicationId;?>);

			$('#day option[value="<?= $priceInfo->Day; ?>"]').prop('selected', true);

			// Get All Data For Select Menu Script Start
			$(document).on('change', '#media-name-id', function(){
				var id = $('#media-name-id').val();
				GetDataForDependantSelectMenu("PublicationModel","GetPublicationByForignKey","MediaId",id,"#publication-select-menu","publication-id","Select Publication",0);
			});

			function GetDataForSelectMenu(modelName,methodName,divId,idNameAttr,selectHeader,selectId)
			{
				$.ajax({
					type:'ajax',
					url:'<?php echo base_url('index.php/Price/GetDataForSelectMenu'); ?>',
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
					url:'<?php echo base_url('index.php/Price/GetDataForDependantSelectMenu'); ?>',
					method:'POST',
					data:{modelName:modelName,methodName:methodName,fieldName:fieldName,id:id,idNameAttr:idNameAttr,selectHeader:selectHeader,selectId:selectId},
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
