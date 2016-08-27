<?php
	$i=0;
	$appr_companies = array();
	foreach($companies as $company)
	{
		if($company['approved'] == 1)
		{
			$appr_companies[$i] = $company;
			$i++;
		}
	}
?>
<title> All Companies | TAPS NITW</title>
<br>
<div class="row center">
	<h4>All Companies</h4>
</div>
<?php if(count($appr_companies)===0){ ?>
<div class="row">
	<div class="col s12 m12 l12 center">
		<h4 style="margin-top: 20px">No companies to show</h4>
		<h6 style="margin-top: 20px">TnP coordinators will add companies soon</h6>
	</div>
</div>
<?php } else { ?>
<div class="row">
	<?php foreach ($appr_companies as $company){ ?>
		<div class="col s12 m6 l4">
			<div class="card white hoverable">
				<div class="card-content">
					<div class="card-title black-text">
						<div class="row">
							<div class="col s3 m3 l3">
								<img src="<?php echo base_url('assets/images/companies/').'/'.$company['logofilename']; ?>" alt="<?php echo $company['name']; ?> Logo" style="max-width:50px;max-height:50px">
							</div>
							<div class="col s9 m9 l9 valign-wrapper">
								<span class="valign"><?php echo $company['name']; ?></span>
							</div>
						</div>
					</div>
					<p><?php echo $company['info']; ?></p>
				</div>
				<div class="card-action">
					<?php echo anchor_popup($company['website']);?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php } ?>
