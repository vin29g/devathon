<h2>Upload Student List</h2>
<hr>
<br>
<?php print_r($error['error']);?> 
<?php echo form_open_multipart('admin/view_students_email');?> 
<form name="myForm"  action="<?php echo base_url('admin/view_students_special');?>" method="POST">
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
</div>
<button class="btn waves-effect waves-light" type="Submit">Next</button>
</form>
