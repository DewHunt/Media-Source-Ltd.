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
						<?php include APPPATH.'views/admin/master/system-left-menu.php'?>
						
						<div class="span9">
							<div class="widget">
								<div class="widget-header">
									<i class="icon-th-list"></i>
									<h3>All Publication Information</h3>
									<a href="<?= base_url('index.php/Publication/Publication'); ?>" type="submit" class="btn btn-primary" target="_blank">Create Publication</a> 
								</div>  <!-- /widget-header -->

								<div class="widget-content">
									<table id="publication-data" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Media</th>
												<th>Type</th>
												<th>Frequency</th>
												<th>Description</th>
												<th>Logo</th>
												<th>Action</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<th>Sl</th>
												<th>Name</th>
												<th>Media</th>
												<th>Type</th>
												<th>Frequency</th>
												<th>Description</th>
												<th>Logo</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>

									<div id="publication-modal" class="modal fade">
										<div class="modal-dialog">
											<form method="POST" id="publication-form">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="modal-title">Update Publication</h3>
													</div>

													<div class="modal-body">
														<label class="control-label" for="name"><span class="mendatory">*</span>&nbsp;Name</label>
														<input type="text" id="publication-name" name="publication-name" placeholder="Enter Publication Name" style="width: 100%" value="">
														                     
														<label class="control-label" for="media"><span class="mendatory">*</span>&nbsp;Media</label>
														<div id="media-select-menu"></div>

														<label class="control-label" for="publication-type"><span class="mendatory">*</span>&nbsp;Type</label>
														<div id="publication-type-select-menu"></div>                     
														<label class="control-label" for="publication-place"><span class="mendatory">*</span>&nbsp;Place</label>
														<div id="publication-place-select-menu"></div>
                     
														<label class="control-label" for="publication-frequency"><span class="mendatory">*</span>&nbsp;Frequency</label>
														<div id="publication-frequency-select-menu"></div>						
														<label class="control-label" for="publication-language" id="language-label"><span class="mendatory">*</span>&nbsp;Language</label>
														<label class="radio inline" for="bangla">
															<input type="radio" name="publication-language" id="publication-language" value="Bangla">&nbsp;&nbsp;Bangla
														</label>
														<label class="radio inline" for="english">
															<input type="radio" name="publication-language" id="publication-language" value="English">&nbsp;&nbsp;English
														</label>

														<label class="control-label" for="description">Description</label>
														<textarea rows="3" id="publication-description" name="publication-description" style="width: 100%;"></textarea>

														<label class="control-label" for="logo">Logo</label>
														<input type="file" name="new-publication-image" id="new-publication-image" class="form-control">

														<label id="uploaded-publication-image"></label>
													</div>

													<div class="modal-footer">
														<input type="hidden" name="publication-id" id="publication-id" value="">

														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

														<input type="submit" name="update-publication" id="update-publication" class="btn btn-success" value="Update">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>  <!-- /widget-content --> 
							</div>  <!-- /widget --> 
						</div>  <!-- /span9 -->
					</div> <!-- /row --> 
				</div>  <!-- /container --> 
			</div>  <!-- /main-inner --> 
		</div>  <!-- /main -->

		<?php include APPPATH.'views/admin/master/footer.php'; ?>
		
		<!-- Custom JS File Start -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.has-sub').click(function(){
					$(this).toggleClass('tap');
				});

				var dataTable = $('#publication-data').DataTable({
					'processing':true,
					'serverSide':true,
					'order':[],
					'ajax':{
						url:'<?php echo base_url("index.php/Publication/GetPublicationAllInfo"); ?>',
						type:'POST'
					},
					'dataType':'json',
					'columnDefs':[
						{
							'targets':[0, 2, 3, 4, 5, 6, 7],
							'orderable':false
						},
					],
				});

				GetDataForSelectMenu("MediaNameModel","GetAllMediaName","#media-select-menu","media-name-id","Select Media");
				GetDataForSelectMenu("PublicationTypeModel","GetAllPublicationType","#publication-type-select-menu","publication-type-id","Select Publication Type");
				GetDataForSelectMenu("PublicationPlaceModel","GetAllPublicationPlace","#publication-place-select-menu","publication-place-id","Select Publication Place");
				GetDataForSelectMenu("PublicationFrequencyModel","GetAllPublicationFrequency","#publication-frequency-select-menu","publication-frequency-id","Select Publication Frequency");

				// Get Media Name Data Script Start
				function GetDataForSelectMenu(modelName,methodName,divId,idNameAttr,selectHeader)
				{
					$.ajax({
						type:'ajax',
						url:'<?php echo base_url('index.php/Publication/GetDataForSelectMenu'); ?>',
						method:'POST',
						data:{modelName:modelName,methodName:methodName,idNameAttr:idNameAttr,selectHeader:selectHeader},
						success:function(data){
							$(divId).html(data);
						}
					});
				} 
				// Get Media Name Data Script End

				$(document).on('click', '.update', function(){
					var publicationId = $(this).attr('id');

					$.ajax({
						url:'<?php echo base_url("index.php/Publication/GetPublicationById"); ?>',
						method:'POST',
						data:{publicationId:publicationId},
						dataType:'json',
						success:function(data){
							$('#publication-modal').modal('show');
							$('#publication-name').val(data.publicationName);
							$('#publication-description').val(data.publicationDescription);
							$('#uploaded-publication-image').html(data.publicationImage);
							$('#media-name-id option[value="'+data.mediaId+'"]').prop('selected', true);
							$('#publication-type-id option[value="'+data.publicationTypeId+'"]').prop('selected', true);
							$('#publication-place-id option[value="'+data.publicationPlaceId+'"]').prop('selected', true);
							$('#publication-frequency-id option[value="'+data.publicationFrequencyId+'"]').prop('selected', true);
							$('input[name=publication-language][value="'+data.publicationLanguage+'"]').prop('checked', true);
							$('#publication-id').val(data.publicationId);
						}
					});

				});

				$(document).on('submit', '#publication-form', function(){
					var publicationName = $('#publication-name').val();
					var mediaNameId = $('#media-name-id').val();
					var publicationTypeId = $('#publication-type-id').val();
					var publicationPlaceId = $('#publication-place-id').val();
					var publicationFrequencyId = $('#publication-frequency-id').val();
					var publicationLanguage = $('input[name=publication-language]:checked').val();
					var publicationDescription = $('#publication-description').val();
					var extention = $('#new-publication-image').val().split('.').pop().toLowerCase();

					if (extention != "")
					{
						if (jQuery.inArray(extention, ['gif', 'png', 'jpg', 'jpeg']) == -1)
						{
							alert('Oops! Invalid Image File.');
							$('#new-media-image').val('');
							return false;
						}
					}
					
					if (publicationName == "")
					{
						alert("Oops! Publication Name Can't Be Empty. Please Enter Publication Name");
						$('#publication-name').css({'border':'1px solid red'});

						$('#media-name-id').css({'border':'1px solid gray'});
						$('#publication-type-id').css({'border':'1px solid gray'});
						$('#publication-place-id').css({'border':'1px solid gray'});
						$('#publication-frequency-id').css({'border':'1px solid gray'});
						$('#language-label').css({'color':'black'});
						$('#language-label').css({'color':'black'});
						return false;
					}
					else if (mediaNameId == "")
					{
						$('#publication-name').css({'border':'1px solid gray'});

						alert("Oops! Media Name Can't Be Empty. Please Select Media Name");
						$('#media-name-id').css({'border':'1px solid red'});
						
						$('#publication-name').css({'border':'1px solid gray'});
						$('#publication-type-id').css({'border':'1px solid gray'});
						$('#publication-place-id').css({'border':'1px solid gray'});
						$('#publication-frequency-id').css({'border':'1px solid gray'});
						$('#language-label').css({'color':'black'});
						return false;
					}
					else if (publicationTypeId == "")
					{
						$('#media-name-id').css({'border':'1px solid gray'});

						alert("Oops! Publication Type Can't Be Empty. Please Select Publication Type");
						$('#publication-type-id').css({'border':'1px solid red'});
						
						$('#publication-name').css({'border':'1px solid gray'});
						$('#media-name-id').css({'border':'1px solid gray'});
						$('#publication-place-id').css({'border':'1px solid gray'});
						$('#publication-frequency-id').css({'border':'1px solid gray'});
						$('#language-label').css({'color':'black'});
						return false;						
					}
					else if (publicationPlaceId == "")
					{
						$('#publication-type-id').css({'border':'1px solid gray'});

						alert("Oops! Publication Place Can't Be Empty. Please Select Publication Place");
						$('#publication-place-id').css({'border':'1px solid red'});
						
						$('#publication-name').css({'border':'1px solid gray'});
						$('#media-name-id').css({'border':'1px solid gray'});
						$('#publication-type-id').css({'border':'1px solid gray'});
						$('#publication-frequency-id').css({'border':'1px solid gray'});
						$('#language-label').css({'color':'black'});
						return false;
					}
					else if (publicationFrequencyId == "")
					{
						$('#publication-place-id').css({'border':'1px solid gray'});
						alert("Oops! Publication Frequency Can't Be Empty. Please Select Publication Frequency");
						$('#publication-frequency-id').css({'border':'1px solid red'});
						
						$('#publication-name').css({'border':'1px solid gray'});
						$('#media-name-id').css({'border':'1px solid gray'});
						$('#publication-type-id').css({'border':'1px solid gray'});
						$('#publication-place-id').css({'border':'1px solid gray'});
						$('#language-label').css({'color':'black'});
						return false;
					}
					else if (publicationLanguage == null)
					{
						$('#publication-frequency-id').css({'border':'1px solid gray'});

						alert("Oops! Publication Language Can't Be Empty. Please Select Publication Language");
						$('#language-label').css({'color':'red'});
						
						$('#publication-name').css({'border':'1px solid gray'});
						$('#media-name-id').css({'border':'1px solid gray'});
						$('#publication-type-id').css({'border':'1px solid gray'});
						$('#publication-place-id').css({'border':'1px solid gray'});
						$('#publication-frequency-id').css({'border':'1px solid gray'});
						return false;
					}
					else
					{
						$('#language-label').css({'color':'black'});

						$.ajax({
							url:'<?php echo base_url("index.php/Publication/UpdatePublication"); ?>',
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data){
								alert(data);
								$('#publication-form')[0].reset();
								$('#publication-modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					}
				});

				$(document).on('click', '.delete', function(){
					var publicationId = $(this).attr('id');

					alert(publicationId);
				});
			});
		</script>
	</body>
</html>
