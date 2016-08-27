<title>Add Visit | TAPS NITW</title>
<br>
<?php $half = count($spcls)/2; $index = 0; ?>
<?php if(count($companies)===0){ ?>
<div class="row">
	<div class="col s12 m12 l12 center">
		<h4 style="margin-top: 20px">No companies to show</h4>
		<h6 style="margin-top: 20px">Go to add company page to add companies</h6>
		<a class="btn" style="margin-top: 20px" href="<?php echo base_url('cod/add_company')?>">Add Company</a>
	</div>
</div>
<?php }else{ ?>
<div class="row center">
	<h4>Add Company Visit</h4>
</div>
<div class="row">
	<div class="col s12 m12 l12">
		<form id="visitform" method="post" action="<?php echo base_url('cod/add_visit')?>" onsubmit="return checkDates();">
			<div class="row">
				<div class="col s12 m10 l8 offset-m1 offset-l2">
					<h5>Visit Details</h5>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="title" type="text" length="40" name="title" class="validate" required>
					<label for="title">Title</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m10 l8 offset-m1 offset-l2">
					<label for="company_id">Company</label>
					<select id="company_id" name="company_id" class="browser-default" required>
						<?php foreach($companies as $company){ ?>
							<?php if($company['approved'] == 1){ ?>
							<option value="<?php echo $company['id'];?>"><?php echo $company['name'];?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m10 l8 offset-m1 offset-l2">
					<label for="session_id">Session</label>
					<select id="session_id" name="session_id" class="browser-default" required>
						<?php foreach($sessions as $session){ ?>
							<option value="<?php echo $session['id'];?>"><?php echo $session['name'];?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="designation" type="text" length="64" name="designation" class="validate" required>
					<label for="designation">Designation</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m5 l4 offset-m1 offset-l2">
					<input id="app_deadline" type="date" name="app_deadline" class="datepicker" required>
					<label for="app_deadline">Application Deadline</label>
				</div>
				<div class="input-field col s12 m5 l4">
					<input id="selection_dt" type="date" name="selection_dt" class="datepicker" required>
					<label for="selection_dt">Selection Date</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m5 l4 offset-m1 offset-l2">
					<label for="jobtype">Job Type</label>
					<select id="jobtype" name="jobtype" class="browser-default" required>
						<?php foreach($jobtypes as $jobtype){ ?>
							<option value="<?php echo $jobtype['job_type_id'];?>"><?php echo $jobtype['type'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col s12 m5 l4">
					<label for="jobcatg">Job Category</label>
					<select id="jobcatg" name="jobcatg" class="browser-default" required>
						<?php foreach($jobcatgs as $jobcatg){ ?>
							<option value="<?php echo $jobcatg['job_category_id'];?>"><?php echo $jobcatg['category'];?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m5 l4 offset-m1 offset-l2">
					<label>Student Viewable : </label>
					<input type="radio" name="stud_view" value="1" id="viewyes">
					<label for="viewyes" style="margin-right : 20px">Yes</label>
					<input type="radio" name="stud_view" value="2" id="viewno">
					<label for="viewno">No</label>
				</div>
				<div class="col s12 m5 l4">
					<label>Application format : </label>
					<input type="radio" name="app_format" value="1" id="inst">
					<label for="inst" style="margin-right : 20px">Institute</label>
					<input type="radio" name="app_format" value="2" id="comp">
					<label for="comp">Company</label>
				</div>
			</div>
			<div class="row" id="app_link_div" style="display : none">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="app_link" type="url" length="36" name="app_link" class="validate">
					<label for="app_link" id="app_link_label">Application Link</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="salary" type="text" length="36" name="salary" class="validate" required>
					<label for="salary">Salary</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="stp_amt" type="text" length="40" name="stp_amt" class="validate" required>
					<label for="stp_amt">Stipulated Amount</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="bond" type="text" length="40" name="bond" class="validate" required>
					<label for="bond">Bond</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<textarea id="otherinfo" class="materialize-textarea" name="otherinfo" form="visitform"></textarea>
					<label for="otherinfo">Other Information</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m10 l8 offset-m1 offset-l2">
					<h5>Eligibility Details</h5>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m10 l10 offset-m1 offset-l1">
					<span>Specializations</span>
				</div>
				<?php foreach($spcls as $spcl){ ?>
					<?php if($index === 0 || $index === $half){echo '<div class="col s12 m5 l5'; if($index===0){echo ' offset-m1 offset-l1">';}else{echo '">';}} ?>
						<input id="spcl<?php echo $spcl['id']; ?>" value="<?php echo $spcl['id']; ?>" name="spclid[]" type="checkbox" class="filled-in" onchange="showDetails(this)">
						<label for="spcl<?php echo $spcl['id']; ?>"><?php echo $spcl['name']; ?></label>
						<div class="row" id="eligdetails<?php echo $spcl['id']; ?>" style="display : none">
							<div class="col s12 m12 l12">
								<label>Category : </label>
								<br>
								<?php foreach($catgs as $catg){ ?>
									<input id="category<?php echo $spcl['id']; ?>_<?php echo $catg['category']; ?>" name="category<?php echo $spcl['id']; ?>[]" value="<?php echo $catg['category']; ?>" type="checkbox" class="filled-in">
									<label for="category<?php echo $spcl['id']; ?>_<?php echo $catg['category']; ?>" style="margin-left : 20px"><?php echo $catg['category']; ?></label>
								<?php } ?>
							</div>
							<div class="input-field col s6 m6 l6">
								<input id="cgpa<?php echo $spcl['id']; ?>" type="number" min="5.00" max="10.00" step="0.01" name="cgpa<?php echo $spcl['id']; ?>" class="validate">
								<label for="cgpa<?php echo $spcl['id']; ?>">CGPA Cutoff</label>
							</div>
							<?php if($spcl['course'] != 1){ ?>
								<div class="input-field col s6 m6 l6">
									<input id="gradcgpa<?php echo $spcl['id']; ?>" type="number" min="5.00" max="10.00" step="0.01" name="gradcgpa<?php echo $spcl['id']; ?>" class="validate">
									<label for="gradcgpa<?php echo $spcl['id']; ?>">Graduation CGPA Cutoff</label>
								</div>
							<?php } ?>
							<div class="input-field col s6 m6 l6">
								<input id="ssc<?php echo $spcl['id']; ?>" type="number" min="30.00" max="100.00" step="0.01" name="ssc<?php echo $spcl['id']; ?>" class="validate">
								<label for="ssc<?php echo $spcl['id']; ?>">SSC Percentage</label>
							</div>
							<div class="input-field col s6 m6 l6">
								<input id="hsc<?php echo $spcl['id']; ?>" type="number" min="30.00" max="100.00" step="0.01" name="hsc<?php echo $spcl['id']; ?>" class="validate">
								<label for="hsc<?php echo $spcl['id']; ?>">HSC Percentage</label>
							</div>
						</div>
						<br>
					<?php if($index === $half-1 || $index === count($spcls)-1){echo '</div>';} ?>
				<?php $index++; } ?>
			</div>
			<div class="row center">
				<button type="Submit" class="btn">Add Visit</button>
			</div>
		</form>
	</div>
</div>
<?php if(isset($visit_added)){ ?>
<div class="modal center" id="added_banner">
	<div class="modal-content">
		<h5>Company visit <?php if(!$visit_added){echo 'not ';} ?>added</h5>
	</div>
</div>
<script type="text/javascript">
	$("#added_banner").openModal();
</script>
<?php } ?>
<script type="text/javascript">
	function checkDates()
	{
		var selection_dt = new Date($("#selection_dt").val());
		var app_deadline = new Date($("#app_deadline").val());
		var today = new Date();
		if(app_deadline<today || selection_dt<today)
		{
			alert('Application Deadline and Selection Date should be after today');
			return false;
		}
		else
		{
			return true;
		}
		if(selection_dt<app_deadline)
		{
			alert('Application Deadline should be before Selection Date');
			return false;
		}
		else
		{
			return true;
		}
	}

	var applink = document.getElementById('app_link');
	var applinkdiv = document.getElementById('app_link_div');

	$("input[name=app_format]").change(function()
	{
		if($("input[name=app_format]:checked").val() == 2)
		{
			applinkdiv.style.display = "block";
			applink.required = true;
		}
		else
		{
			applinkdiv.style.display = "none";
			applink.required = false;
		}
	});

	var spcls = JSON.parse('<?php echo json_encode($spcls)?>');
	
	function is_pg(selected)
	{
		for(i=0;i<spcls.length;i++)
		{
			if(spcls[i]['id'] == selected)
			{
				return (spcls[i]['course']!=1);
			}
		}
		return false;
	}

	function showDetails(spcl_checkbox)
	{
		check_status = spcl_checkbox.checked;
		spcl_id = spcl_checkbox.value;
		if(check_status)
		{
			document.getElementById('eligdetails' + spcl_id).style.display = "block";
		}
		else
		{
			document.getElementById('eligdetails' + spcl_id).style.display = "none";
		}
		document.getElementById('cgpa' + spcl_id).required = check_status;
		document.getElementById('ssc' + spcl_id).required = check_status;
		document.getElementById('hsc' + spcl_id).required = check_status;
		if(is_pg(spcl_id))
		{
			document.getElementById('gradcgpa' + spcl_id).required = check_status;
		}
	}
</script>
<?php } ?>