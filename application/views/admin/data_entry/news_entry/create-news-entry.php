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
						<form class="form-horizontal" id="news-entry-form" method="POST" action="<?= base_url('index.php/NewsEntry/CreateNews'); ?>">
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

			GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu","media-name-id","Select Media",0);
			GetDataForSelectMenu("PageModel","GetAllPage","#page-select-menu-1","page-id-1","Select Page Name",0);
			GetDataForSelectMenu("HueModel","GetAllHue","#hue-select-menu-1","hue-id-1","Select Hue",0);

			// Get All Data For Select Menu Script Start
			$(document).on('change', '#media-name-id', function(){
				var id = $('#media-name-id').val();
				GetDataForDependantSelectMenu("PublicationModel","GetPublicationByForignKey","MediaId",id,"#publication-select-menu","publication-id","Select Publication",0);
			});

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
