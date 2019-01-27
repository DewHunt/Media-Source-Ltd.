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
						<form class="form-horizontal" id="price-form" method="POST" action="<?= base_url('index.php/Price/CreatePrice'); ?>">
							<div class="span12">

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-success success-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/Price/Price');?>">&times;</a>
											<strong>Great!</strong> Your Price Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Price/Price'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Price Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Price/Price'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Price Already Saved In Data Base...
										</div>
								<?php
									}
								?>
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Media Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Price<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Price</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">                     
												<label class="control-label" for="media">Media</label>
												<div class="controls">
													<div id="media-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="publication">Publication</label>
												<div class="controls">
													<div id="publication-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="day">Day</label>
												<div class="controls">
													<div id="day-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="price-details">Price Details</label>
												<div class="controls">
													<table class="table table-striped table-bordered table-responsive">
														<thead>
															<tr>
																<th>SL</th>
																<th>Price Title</th>
																<th>Select Pages</th>
																<th>Hue</th>
																<th>Column</th>
																<th>×</th>
																<th>Inch</th>
																<th>Price</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>1</td>
																<td>
																	<input type="text" class="span2" id="price-title-1" name="price-title-1" value="">
																</td>
																<td>
																	<div id="page-select-menu-1"></div>
																</td>
																<td>
																	<div id="hue-select-menu-1"></div>
																</td>
																<td>
																	<input type="text" class="span1" id="col-1" name="col-1" value="1">
																</td>
																<td>×</td>
																<td>
																	<input type="text" class="span1" id="inch-1" name="inch-1" value="1">
																</td>
																<td>
																	<input type="text" class="span1" id="price-1" name="price-1" value="">
																</td>
															</tr>
														</tbody>
													</table>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button onclick="return addRow();" class="btn btn-primary">Add More</button>
												<button onclick="return remove();" class="btn btn-danger">Remove</button>

												<button type="submit" id="button-price" name="button-price" class="btn btn-primary" onclick="return Validation()">Create Price</button>
												<input type="hidden" name="sl" id="sl" value="1"> 
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

				GetDataForSelectMenu("PageModel","GetAllPage",pageSelectMenu,pageIdNameAttr,"Select Page Name");
				GetDataForSelectMenu("HueModel","GetAllHue",hueSelectMenu,hueIdNameAttr,"Select Hue");

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

				cell1.innerHTML = sl;
				cell2.innerHTML = '<input type="text" class="span2" id="price-title-'+sl+'" name="price-title-'+sl+'" value="">';
				cell3.innerHTML = '<div id="page-select-menu-'+sl+'"></div>';
				cell4.innerHTML = '<div id="hue-select-menu-'+sl+'"></div>';
				cell5.innerHTML = '<input type="text" class="span1" id="col-'+sl+'" name="col-'+sl+'" value="1">';
				cell6.innerHTML = '×';
				cell7.innerHTML = '<input type="text" class="span1" id="inch-'+sl+'" name="inch-'+sl+'" value="1">';
				cell8.innerHTML = '<input type="text" class="span1" id="price-'+sl+'" name="price-'+sl+'" value="">';

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

			GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu","media-name-id","Select Media");
			GetDataForSelectMenu("PublicationModel","GetAllPublication","#publication-select-menu","publication-id","Select Publication");
			GetDataForSelectMenu("DayModel","GetAllDay","#day-select-menu","day-id","Select Day");
			GetDataForSelectMenu("PageModel","GetAllPage","#page-select-menu-1","page-id-1","Select Page Name");
			GetDataForSelectMenu("HueModel","GetAllHue","#hue-select-menu-1","hue-id-1","Select Hue");

			// Get All Data For Select Menu Script Start
			function GetDataForSelectMenu(modelName,methodName,divId,idNameAttr,selectHeader)
			{
				$.ajax({
					type:'ajax',
					url:'<?php echo base_url('index.php/Price/GetDataForSelectMenu'); ?>',
					method:'POST',
					data:{modelName:modelName,methodName:methodName,idNameAttr:idNameAttr,selectHeader:selectHeader},
					success:function(data){
						$(divId).html(data);
					}
				});
			} 
			// Get All Data For Select Menu Script End

			function Validation()
			{
				var mediaId = $('#media-name-id').val();
				var publicationId = $('#publication-id').val();
				var dayId = $('#day-id').val();

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

				if (dayId == "")
				{
					alert("Day Can't Be Empty");
					return false;
				}

				for (var i = 1; i <= totalRow; i++)
				{
					var priceTitle = "#price-title-"+i;
					var pageId = "#page-id-"+i;
					var hueId = "#hue-id-"+i;
					var col = "#col-"+i;
					var inch = "#inch-"+i;
					var price = "#price-"+i;

					if ($(priceTitle).val() == "")
					{
						alert("In Row "+i+", Price Title Can't be Empty");
						return false;
					}

					if ($(pageId).val() == "")
					{
						alert("In Row "+i+", Page Name Can't Be Empty.");
						return false;
					}

					if ($(hueId).val() == "")
					{
						alert("In Row "+i+", Hue Can't Be Empty");
						return false;
					}

					if ($(col).val() == "")
					{
						alert("In Row "+i+", Column Can't be Empty");
						return false;
					}

					if ($(inch).val() == "")
					{
						alert("In Row "+i+", Inch Can't be Empty");
						return false;
					}

					if ($(price).val() == "")
					{
						alert("In Row "+i+", Price Can't be Enpty");
						return false;
					}
				}
			}
		</script>
	</body>
</html>
