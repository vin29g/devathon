<title>Add Company | TAPS NITW</title>
<br>
<div class="row">
	<div class="col s12 m10 l8 offset-m1 offset-l2 center">
		<h4>Add Company</h4>
	</div>
</div>
<div class="row">
	<div class="col s12 m10 l8 offset-m1 offset-l2">
		<form method="post" action="<?php echo base_url('cod/add_company')?>" enctype="multipart/form-data" accept-charset="utf-8">
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<input id="company_name" type="text" length="128" name="company_name" class="validate" required>
					<label for="company_name">Company Name</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<input placeholder="http://www.company-website.com" id="company_website" type="url" length="64" name="company_website" class="validate" required>
					<label for="company_website">Company Website</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<input id="info" type="text" length="200" name="info" class="validate" required>
					<label for="info">Description</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12 l12 file-field input-field">
					<div class="btn">
						<span>File</span>
						<input type="file" name="logo" required>
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Company Logo">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<section>
						<h5>Instructions for adding company logos :</h5>
						<ol>
							<li>Please upload square shaped images having good resolution for better appearance</li>
							<li>Image size should be less than 512KB</li>
							<li>Only .jpg and .png images are allowed</li>
							<li>Image dimensions should not exceed 1024 x 1024</li>
						</ol>
					</section>
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
				<button type="Submit" class="btn">Add Company</button>
			</div>
		</form>
	</div>
</div>
<?php if(isset($company_added)){ ?>
<div class="modal center" id="added_banner">
	<div class="modal-content">
		<h5>Company <?php if(!$company_added){echo 'not ';} ?>added</h5>
	</div>
</div>
<script type="text/javascript">
	$("#added_banner").openModal();
</script>
<?php } ?>