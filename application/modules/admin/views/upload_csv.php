<h2>Upload Student List</h2>
<hr>
<br>
<?php print_r($error['error']);?> 
<?php echo form_open_multipart('admin/upload_student_list');?> 
<form name="myForm"  action="<?php echo base_url('admin/upload_student_list');?>" method="POST">
<div class="container">
	<div class="row">
		<div class="col s4">
			<select class="browser-default" name="special">
				<option value="" disabled="" selected="">Select Specialization</option>
				<?php foreach($special as $branch){?>

				<option value="<?php echo $branch['id']?>"><?php echo $branch['name']?></option>
				<?php }?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col s4">
				<div class="file-field input-field">
					<input class="file-path validate" type="text">
					<div class="btn">
						<span>File</span>
						<input type="file" name="userfile" size="20">
					</div>
				</div>
		</div>
	</div>
</div>
<button class="btn waves-effect waves-light" type="Submit">Upload</button>
</form>
