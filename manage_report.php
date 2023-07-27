<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="complaint-frm">
		<input type="hidden" name="id" value="">
		<div class="form-group">
		<label for="" class="control-label">Type of crime</label>
				<select class="custom-select mb-3" id="crime_type">
		<option selected>Choose crime</option>
		<option value="1">Theft</option>
		<option value="2">Public Disturbance</option>
		<option value="3">Drug-related</option>
		<option value="5">Harassment</option>
		<option value="6">Domestic Violence</option>
		<option value="7">Vandalism</option>
		<option value="8">Robbery</option>
		<option value="9">Assault</option>
		</select>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Report Message</label>
			<textarea cols="30" rows="3" name="message" required="" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Incident Address</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
		</div>
		<div class="form-group">
		<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
		</div>

		<button class="button btn btn-success ">Create</button>
		<button class="button btn btn-danger " type="button" data-dismiss="modal">Cancel</button>

		

	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
	
</style>
<script>
	$('#complaint-frm').submit(function(e){
		e.preventDefault()
		start_load()
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=complaint',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#complaint-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success:function(resp){
				if(resp == 1){
					location.reload();
					alert_toast("Data successfully saved.",'success')
						setTimeout(function(){
							location.reload()
						},1000)
				}else{
					end_load()
				}
			}
		})
	})
</script>