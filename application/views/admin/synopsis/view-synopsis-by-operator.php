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
		</script>
	</body>
</html>
