<title>New Application | TAPS NITW</title>
<br>
<?php if(count($visits) === 0){ ?>
<div class="row">
	<div class="col s12 m12 l12 center">
		<h4 style="margin-top: 20px">No company visits to show</h4>
		<h6 style="margin-top: 20px">Either you are not eligible for more applications or the coordinators are yet to add more visits</h6>
	</div>
</div>
<?php }else{ ?>
<div class="row center">
	<h4>Applications</h4>
</div>
<div class="row">
	<?php foreach($visits as $visit) { ?>
		<div class="col s12 m6 l6" id="visit_div<?php echo $visit['id']; ?>">
			<div class="card">
				<div class="card-content">
					<div class="row">
						<img src="<?php echo base_url('assets/images/companies/').'/'.$visit['logofilename']; ?>" alt="<?php echo $visit['name']; ?> Logo" class="card-profile-image col m3 s3 l3 responsive-img">
						<span class="card-title col m9 s9 l9 center black-text">
							<?php echo $visit['name']; ?>
						</span>
					</div>
					<div class="row">
						<div class="col s3 m3 l3">Designation</div>
						<div class="col s1 m1 l1">:</div>
						<div class="col s8 m8 l8"><?php echo $visit['designation'];?></div>
					</div>
					<div class="row">
						<div class="col s3 m3 l3">Application Deadline</div>
						<div class="col s1 m1 l1">:</div>
						<div class="col s8 m8 l8">
							<?php echo date('d M Y H:i:s',strtotime($visit['application_deadline']));?>
						</div>
					</div>
					<div class="row">
						<div class="col s3 m3 l3">Selection Date</div>
						<div class="col s1 m1 l1">:</div>
						<div class="col s8 m8 l8">
							<?php echo date('d M Y',strtotime($visit['selection_date']));?>
						</div>
					</div>
				</div>
				<div class="card-action">
					<div class="row right">
						<div class="col">
							<button class="activator btn blue">Read More</button>
						</div>
						<div class="col" id="withdraw<?php echo $visit['id']; ?>" style="display : <?php if(!$visit['applied']){echo 'none';}else{echo 'block';} ?>">
							<button class="btn red" onclick="withdraw(<?php echo $visit['id']; ?>)">Withdraw</button>
						</div>
						<div class="col" id="apply<?php echo $visit['id']; ?>" style="display : <?php if($visit['applied']){echo 'none';}else{echo 'block';} ?>">
							<button class="btn green" onclick="apply(<?php echo $visit['id']; ?>)">Apply</button>
							<input type="hidden" id="apptype<?php echo $visit['id']; ?>" value="<?php if($visit['application_format'] == 1){echo 'institute'; }else{echo 'company'; } ?>">
							<?php if($visit['application_format'] != 1){ ?>
								<input type="hidden" id="applink<?php echo $visit['id']; ?>" value="<?php echo $visit['app_link']; ?>">
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="card-reveal black-text">
					<div class="row card-title">
						<span class="col s11 m11 l11 black-text">
							<?php echo $visit['name']; ?> - <?php echo $visit['title']; ?>
							<i class="right mdi-navigation-close"></i>
						</span>
					</div>
					<div class="row">
						<div class="col s3 m3 l3">Salary</div>
						<div class="col s1 m1 l1">:</div>
						<div class="col s8 m8 l8"><?php echo $visit['salary']; ?></div>
					</div>
					<?php if(null!=$visit['other_information']){ ?>
					<div class="row">
						<div class="col s3 m3 l3">Other information</div>
						<div class="col s1 m1 l1">:</div>
						<div class="col s8 m8 l8"><?php echo $visit['other_information']; ?></div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php } ?>

<script type="text/javascript">
	var request;
	function apply(applyid)
	{
		if(request)
		{
			request.abort();
		}
		request=$.ajax({url:"<?php echo base_url('student/apply'); ?>",type:"post",data:"apply_id="+applyid});
		request.done(function (response, textStatus, jqXHR)
		{
			document.getElementById('apply' + applyid).style.display = "none";
			document.getElementById('withdraw' + applyid).style.display = "block";
			if(document.getElementById('apptype' + applyid).value != "institute")
			{
				alert('To apply to this company, visit the link that will open and fill the application form provided.');
				window.open(document.getElementById('applink' + applyid).value);
			}
		});
		request.fail(function (jqXHR, textStatus, errorThrown)
		{
			alert(textStatus + ' ' + errorThrown);
		});
	}
	function withdraw(withdrawid)
	{
		if(request)
		{
			request.abort();
		}
		request=$.ajax({url:"<?php echo base_url('student/withdraw'); ?>",type:"post",data:"withdraw_id="+withdrawid});
		request.done(function (response, textStatus, jqXHR)
		{
			document.getElementById('apply' + withdrawid).style.display = "block";
			document.getElementById('withdraw' + withdrawid).style.display = "none";
			if(document.getElementById('apptype' + withdrawid).value != "institute")
			{
				alert('To withdraw from this company, visit the link that will open and withdraw your application.');
				window.open(document.getElementById('applink' + withdrawid).value);
			}
		});
		request.fail(function (jqXHR, textStatus, errorThrown)
		{
			alert(textStatus + ' ' + errorThrown);
		});
	}
</script>