<title>Modify Company | TAPS NITW</title>
<br>
<div class="row">
	<div class="col s12 m10 l8 offset-m1 offset-l2 center">
		<h4>Modify Company Details</h4>
	</div>
</div>
<div class="row">
	<div class="col s12 m10 l8 offset-m1 offset-l2">
		<form method="post" onsubmit="return checkChange();" action="<?php echo base_url('cod/modify_company')?>" enctype="multipart/form-data" accept-charset="utf-8">
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<input id="new_name" type="text" length="128" name="new_name" class="validate" value="<?php echo $company['name']; ?>" required>
					<label for="new_name">New Company Name</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<input placeholder="http://www.company-website.com" id="new_website" type="url" length="64" name="new_website" class="validate" value="<?php echo $company['website']; ?>" required>
					<label for="new_website">New Company Website</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<input id="info" type="text" length="200" name="info" class="validate" value="<?php echo $company['info']; ?>" required>
					<label for="info">New Description</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12 l12 file-field input-field">
					<div class="btn">
						<span>File</span>
						<input type="file" name="new_logo" id="logofile">
					</div>
					<div class="file-path-wrapper">
						<input id="logotext" name="logotext" class="file-path validate" type="text" placeholder="New Company Logo">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s1 m1 l1">
					<i class="mdi-alert-error small"></i>
				</div>
				<div class="col s11 m11 l11">
					After Company details are modified, it needs to be approved by the Chief Coordinators. To see the status of the companies go to All Companies tab.
				</div>
			</div>
			<div class="row center">
				<input type="hidden" value="<?php echo $company['id']; ?>" name="company">
				<button type="Submit" class="btn">Modify Details</button>
			</div>
		</form>
	</div>
</div>
<?php if(isset($modified)){ ?>}
<div class="modal center" id="modified_banner">
	<div class="modal-content">
		<h5>Company <?php if(!$added){echo 'not ';} ?>modified</h5>
	</div>
</div>
<script type="text/javascript">
	$("#modified_banner").openModal();
</script>
<?php } ?>
<script type="text/javascript">
	var nameChange = false;
	var siteChange = false;
	var infoChange = false;
	var logoChange = false;
	$("#new_name").change(function()
	{
		nameChange = true;
	});
	$("#new_website").change(function()
	{
		siteChange = true;
	});
	$("#info").change(function()
	{
		infoChange = true;
	});
	$("#logotext").change(function()
	{
		logoChange = true;
		var logofile = document.getElementById('logofile');
		logofile.required=true;
	});
	function checkChange()
	{
		if(nameChange || siteChange || infoChange || logoChange)
		{
			return true;
		}
		else
		{
			alert('Change atleast one Company Detail before submitting');
			return false;
		}
	}
</script>