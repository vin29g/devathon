<title>Modify Visit | TAPS NITW</title>
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
	<h4>Modify Company Visit</h4>
</div>
<div class="row">
	<div class="col s12 m12 l12">
		<form id="visitform" method="post" action="<?php echo base_url('cod/modify_visit')?>" onsubmit="return checkDates();">
			<div class="row">
				<div class="col s12 m10 l8 offset-m1 offset-l2">
					<h5>New Visit Details</h5>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="title" type="text" length="40" name="title" class="validate" value="<?php echo $visit['title']; ?>" required>
					<label for="title">New Title</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m10 l8 offset-m1 offset-l2">
					<label for="company_id">New Company</label>
					<select id="company_id" name="company_id" class="browser-default" required>
						<?php foreach($companies as $company){ ?>
							<?php if($company['approved'] == 1){ ?>
							<option value="<?php echo $company['id'];?>" <?php if($company['id'] == $visit['company_id']){echo 'selected';} ?>><?php echo $company['name'];?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m10 l8 offset-m1 offset-l2">
					<label for="session_id">New Session</label>
					<select id="session_id" name="session_id" class="browser-default" required>
						<?php foreach($sessions as $session){ ?>
							<option value="<?php echo $session['id'];?>" <?php if($session['id']==$visit['session_id']){echo 'selected';} ?>><?php echo $session['name'];?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="designation" type="text" length="64" name="designation" class="validate" value="<?php echo $visit['designation']; ?>" required>
					<label for="designation">New Designation</label>
				</div>
			</div>
			<?php
				$application_deadline = date('d M, Y', strtotime($visit['application_deadline']));
				$selection_date = date('d M, Y', strtotime($visit['selection_date']));
			?>
			<div class="row">
				<div class="input-field col s12 m5 l4 offset-m1 offset-l2">
					<input id="app_deadline" type="date" name="app_deadline" class="datepicker" value="<?php echo $application_deadline; ?>" required>
					<label for="app_deadline">New Application Deadline</label>
				</div>
				<div class="input-field col s12 m5 l4">
					<input id="selection_dt" type="date" name="selection_dt" class="datepicker" value="<?php echo $selection_date; ?>" required>
					<label for="selection_dt">New Selection Date</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m5 l4 offset-m1 offset-l2">
					<label for="jobtype">New Job Type</label>
					<select id="jobtype" name="jobtype" class="browser-default" required>
						<?php foreach($jobtypes as $jobtype){ ?>
							<option value="<?php echo $jobtype['job_type_id'];?>" <?php if($jobtype['job_type_id']==$visit['job_type']){echo 'selected';} ?>><?php echo $jobtype['type'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col s12 m5 l4">
					<label for="jobcatg">New Job Category</label>
					<select id="jobcatg" name="jobcatg" class="browser-default" required>
						<?php foreach($jobcatgs as $jobcatg){ ?>
							<option value="<?php echo $jobcatg['job_category_id'];?>" <?php if($jobcatg['job_category_id']==$visit['job_category']){echo 'selected';} ?>><?php echo $jobcatg['category'];?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m5 l4 offset-m1 offset-l2">
					<label>New Student Viewable : </label>
					<input type="radio" name="stud_view" value="1" id="viewyes" <?php if($visit['stud_viewable']==1){echo 'checked';} ?>>
					<label for="viewyes" style="margin-right : 20px">Yes</label>
					<input type="radio" name="stud_view" value="2" id="viewno" <?php if($visit['stud_viewable']==2){echo 'checked';} ?>>
					<label for="viewno">No</label>
				</div>
				<div class="col s12 m5 l4">
					<label>New Application format : </label>
					<input type="radio" name="app_format" value="1" id="inst" <?php if($visit['application_format']==1){echo 'checked';} ?>>
					<label for="inst" style="margin-right : 20px">Institute</label>
					<input type="radio" name="app_format" value="2" id="comp" <?php if($visit['application_format']==2){echo 'checked';} ?>>
					<label for="comp">Company</label>
				</div>
			</div>
			<div class="row" id="app_link_div" style="display : none">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="app_link" type="url" length="36" name="app_link" value="<?php echo $visit['app_link']?>" class="validate">
					<label for="app_link" id="app_link_label">New Application Link</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="salary" type="text" length="36" name="salary" value="<?php echo $visit['salary']?>" class="validate" required>
					<label for="salary">New Salary</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="stp_amt" type="text" length="40" name="stp_amt" value="<?php echo $visit['stipulated_amt']?>" class="validate" required>
					<label for="stp_amt">New Stipulated Amount</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<input id="bond" type="text" length="40" name="bond" value="<?php echo $visit['bond']?>" class="validate" required>
					<label for="bond">New Bond</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<textarea id="otherinfo" class="materialize-textarea" name="otherinfo" form="visitform"><?php echo $visit['other_information']; ?></textarea>
					<label for="otherinfo">New Other Information</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m10 l8 offset-m1 offset-l2">
					<h5>New Eligibility Details</h5>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m10 l10 offset-m1 offset-l1">
					<span>New Specializations</span>
				</div>
				<?php foreach($spcls as $spcl){
					$oldcgpa = '';
					$oldgradcgpa = '';
					$oldssc = '';
					$oldhsc = '';
					$oldcatgs = array();
					foreach($eligs as $elig)
					{
						if($spcl['id'] == $elig['specialization_id'])
						{
							$oldcgpa = $elig['cgpa'];
							$oldssc = $elig['ssc_percentage'];
							$oldhsc = $elig['inter_percentage'];
							$oldcatgs = explode(',', $elig['categories']);
							if($spcl['course'] != 1)
							{
								$oldgradcgpa = $elig['graduation_cgpa'];
							}
						}
					}
				?>
					<?php if($index === 0 || $index === $half){echo '<div class="col s12 m5 l5'; if($index===0){echo ' offset-m1 offset-l1">';}else{echo '">';}} ?>
						<input id="spcl<?php echo $spcl['id']; ?>" value="<?php echo $spcl['id']; ?>" name="spclid[]" type="checkbox" class="filled-in" onchange="showDetails(this)">
						<label for="spcl<?php echo $spcl['id']; ?>"><?php echo $spcl['name']; ?></label>
						<div class="row" id="eligdetails<?php echo $spcl['id']; ?>" style="display : none">
							<div class="col s12 m12 l12">
								<label>New Category : </label>
								<br>
								<?php foreach($catgs as $catg){ ?>
									<input id="category<?php echo $spcl['id']; ?>_<?php echo $catg['category']; ?>" name="category<?php echo $spcl['id']; ?>[]" value="<?php echo $catg['category']; ?>" type="checkbox" class="filled-in" 
									<?php if(in_array($catg['category'],$oldcatgs,true)){echo 'checked="true"';} ?>>
									<label for="category<?php echo $spcl['id']; ?>_<?php echo $catg['category']; ?>" style="margin-left : 20px"><?php echo $catg['category']; ?></label>
								<?php } ?>
							</div>
							<div class="input-field col s6 m6 l6">
								<input id="cgpa<?php echo $spcl['id']; ?>" type="number" min="5.00" max="10.00" step="0.01" name="cgpa<?php echo $spcl['id']; ?>" class="validate" value="<?php echo $oldcgpa; ?>">
								<label for="cgpa<?php echo $spcl['id']; ?>">New CGPA Cutoff</label>
							</div>
							<?php if($spcl['course'] != 1){ ?>
								<div class="input-field col s6 m6 l6">
									<input id="gradcgpa<?php echo $spcl['id']; ?>" type="number" min="5.00" max="10.00" step="0.01" name="gradcgpa<?php echo $spcl['id']; ?>" class="validate" value="<?php echo $oldgradcgpa; ?>">
									<label for="gradcgpa<?php echo $spcl['id']; ?>">New Graduation CGPA Cutoff</label>
								</div>
							<?php } ?>
							<div class="input-field col s6 m6 l6">
								<input id="ssc<?php echo $spcl['id']; ?>" type="number" min="30.00" max="100.00" step="0.01" name="ssc<?php echo $spcl['id']; ?>" class="validate" value="<?php echo $oldssc; ?>">
								<label for="ssc<?php echo $spcl['id']; ?>">New SSC Percentage</label>
							</div>
							<div class="input-field col s6 m6 l6">
								<input id="hsc<?php echo $spcl['id']; ?>" type="number" min="30.00" max="100.00" step="0.01" name="hsc<?php echo $spcl['id']; ?>" class="validate" value="<?php echo $oldhsc; ?>">
								<label for="hsc<?php echo $spcl['id']; ?>">New HSC Percentage</label>
							</div>
						</div>
						<br>
					<?php if($index === $half-1 || $index === count($spcls)-1){echo '</div>';} ?>
				<?php $index++; } ?>
			</div>
			<div class="row center">
				<input type="hidden" name="modify_id" value="<?php echo $visit['id']; ?>">
				<button type="Submit" class="btn">Modify Visit</button>
			</div>
		</form>
	</div>
</div>

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
		showAppLink();
	});

	function showAppLink()
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
	};

	var spcls = JSON.parse('<?php echo json_encode($spcls); ?>');
	var eligs = JSON.parse('<?php echo json_encode($eligs); ?>');
	
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

	$(document).ready(function()
	{
		showAppLink();
		for(i=0;i<spcls.length;i++)
		{
			for(j=0;j<eligs.length;j++)
			{
				if(spcls[i]['id'] == eligs[j]['specialization_id'])
				{
					var spclcheck = document.getElementById('spcl' + spcls[i]['id']);
					spclcheck.checked = true;
					showDetails(spclcheck);
				}
			}
		}
	});
</script>
<?php } ?>