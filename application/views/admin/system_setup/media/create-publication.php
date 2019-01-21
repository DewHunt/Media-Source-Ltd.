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
													<input type="text" class="span10" id="publication-name" name="publication-name" value="">
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
													<div id="publication-place-select-menu"></div>
												<div class="controls">
													<select class="dropdown span10">
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">                     
												<label class="control-label" for="publication-frequency"><span class="mendatory">*</span>&nbsp;Frequency</label>
													<div id="publication-frequency-select-menu"></div>
												<div class="controls">
													<select class="dropdown span10">
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
														<option value=""></option>
													</select>
												</div> <!-- /controls -->       
											</div> <!-- /control-group -->
											
											<div class="control-group">						
												<label class="control-label" for="publication-language"><span class="mendatory">*</span>&nbsp;Language</label>
												
												<div class="controls">
													<label class="checkbox inline" for="bangla">
														<input type="checkbox" name="publication-language" value="bangla">&nbsp;&nbsp;Bangla
													</label>
													
													<label class="checkbox inline" for="english">
														<input type="checkbox" name="publication-language" value="English">&nbsp;&nbsp;English
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
			GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu");
			GetDataForSelectMenu("PublicationTypeModel","GetAllPublicationType","#publication-type-select-menu");

			// Get Media Name Data Script Start
			function GetDataForSelectMenu(modelName,methodName,id)
			{
				$.ajax({
					type:'ajax',
					url:'<?php echo base_url('index.php/Publication/GetDataForSelectMenu'); ?>',
					method:'POST',
					data:{modelName:modelName,methodName:methodName},
					success:function(data){
						$(id).html(data);
					}
				});
			} 
			// Get Media Name Data Script End 
		</script>
	</body>
</html>
