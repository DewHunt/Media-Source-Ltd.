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
						<form class="form-horizontal" id="publication-form" method="POST" action="<?= base_url('index.php/Publication/CreatePublication'); ?>" enctype="multipart/form-data">
							<div class="span12">

								<?php
									if ($message == 1)
									{
								?>
										<div class="alert alert-success success-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?=  base_url('index.php/Publication/Publication');?>">&times;</a>
											<strong>Great!</strong> Your Publication Created Successfully...
										</div>
								<?php
									}

									if ($message == 2)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Publication/Publication'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Publication Can't Be Created...
										</div>
								<?php
									}

									if ($message == 3)
									{
								?>
										<div class="alert alert-info error-message">
											<a type="button" class="btn btn-danger close" data-dismiss="alert" href="<?= base_url('index.php/Publication/Publication'); ?>">&times;</a>
											<strong>Oops! Sorry,</strong> Your Publication Already Saved In Data Base...
										</div>
								<?php
									}
								?>
								<div class="widget">
									<div class="widget-header">
										<i class="icon-tag"></i>
										<h3>Media Setup<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Publication<i class="icon-long-arrow-right"></i>&nbsp;&nbsp;Create Publication</h3>
									</div>
									<!-- /widget-header -->
									
									<div class="widget-content">
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
												<div class="controls">
													<input type="text" class="span10" id="publication-name" name="publication-name" placeholder="Enter Publication Name" value="">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="media"><span class="mendatory">*</span>&nbsp;Media</label>
												<div class="controls">
													<div id="media-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="publication-type"><span class="mendatory">*</span>&nbsp;Type</label>
												<div class="controls">
													<div id="publication-type-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="publication-place"><span class="mendatory">*</span>&nbsp;Place</label>
												<div class="controls">
													<div id="publication-place-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="publication-frequency"><span class="mendatory">*</span>&nbsp;Frequency</label>
												<div class="controls">
													<div id="publication-frequency-select-menu"></div>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">						
												<label class="control-label" for="publication-language" id="language-label"><span class="mendatory">*</span>&nbsp;Language</label>
												
												<div class="controls">
													<label class="radio inline" for="bangla">
														<input type="radio" name="publication-language" value="Bangla">&nbsp;&nbsp;Bangla
													</label>
													
													<label class="radio inline" for="english">
														<input type="radio" name="publication-language" value="English">&nbsp;&nbsp;English
													</label>
												</div>		<!-- /controls -->		
											</div> <!-- /control-group -->
											
											<div class="control-group">										
												<label class="control-label" for="description">Description</label>
												<div class="controls">
													<textarea class="span10" rows="3" id="publication-description" name="publication-description"></textarea>
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">                   
												<label class="control-label" for="logo">Logo</label>
												<div class="controls">
													<input type="file" name="publication-image" id="publication-image">
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="form-actions">
												<button type="submit" id="button-publication" name="button-publication" class="btn btn-primary" onclick="return Validation()">Create Publication</button>
												<button type="reset" class="btn btn-danger">Cancel</button>

												<!-- The Toast Message ID -->
												<p id="message"></p>
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

		<script type="text/javascript">
			GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu","media-name-id","Select Media",0);
			GetDataForSelectMenu("PublicationTypeModel","GetAllPublicationType","#publication-type-select-menu","publication-type-id","Select Publication Type",0);
			GetDataForSelectMenu("PublicationPlaceModel","GetAllPublicationPlace","#publication-place-select-menu","publication-place-id","Select Publication Place",0);
			GetDataForSelectMenu("PublicationFrequencyModel","GetAllPublicationFrequency","#publication-frequency-select-menu","publication-frequency-id","Select Publication Frequency",0);

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
			// Get All Data For Select Menu Script End 

			function Validation()
			{
				var publicationName = $('#publication-name').val();
				var mediaNameId = $('#media-name-id').val();
				var publicationTypeId = $('#publication-type-id').val();
				var publicationPlaceId = $('#publication-place-id').val();
				var publicationFrequencyId = $('#publication-frequency-id').val();
				var publicationLanguage = $('input[name=publication-language]:checked').val();

				$('#publication-name').css({'border':'1px solid #cccccc'});
				$('#media-name-id').css({'border':'1px solid #cccccc'});
				$('#publication-type-id').css({'border':'1px solid #cccccc'});
				$('#publication-place-id').css({'border':'1px solid #cccccc'});
				$('#publication-frequency-id').css({'border':'1px solid #cccccc'});
				$('#language-label').css({'color':'black'});

				if (publicationName == "")
				{
					Message("Oops! Publication Name Can't Be Empty. Please Enter Publication Name");
					$('#publication-name').css({'border':'1px solid red'});
					return false;
				}

				if (mediaNameId == 0)
				{
					Message("Oops! Media Name Can't Be Empty. Please Select Media Name");
					$('#media-name-id').css({'border':'1px solid red'});
					return false;
				}

				if (publicationTypeId == 0)
				{
					Message("Oops! Publication Type Can't Be Empty. Please Select Publication Type");
					$('#publication-type-id').css({'border':'1px solid red'});
					return false;
				}

				if (publicationPlaceId == 0)
				{
					Message("Oops! Publication Place Can't Be Empty. Please Select Publication Place");
					$('#publication-place-id').css({'border':'1px solid red'});
					return false;
				}

				if (publicationFrequencyId == 0)
				{
					Message("Oops! Publication Frequency Can't Be Empty. Please Select Publication Frequency");
					$('#publication-frequency-id').css({'border':'1px solid red'});
					return false;
				}

				if (publicationLanguage == null)
				{
					Message("Oops! Publication Language Can't Be Empty. Please Select Publication Language");
					$('#language-label').css({'color':'red'});
					return false;
				}
			}
		</script>
	</body>
</html>
