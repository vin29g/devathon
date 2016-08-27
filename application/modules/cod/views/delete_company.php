<title>Delete Company | TAPS NITW</title>
<br>
<div class="row">
	<div class="col s12 m10 l8 offset-m1 offset-l2 center">
		<h4>Delete Company</h4>
	</div>
</div>
<div class="row">
	<div class="col s12 m10 l8 offset-m1 offset-l2">
		<form method="post" action="<?php echo base_url('cod/delete_company')?>">
			<div class="row center">
				<h5>Company Name : <?php echo $company['name']; ?></h5>
			</div>
			<div class="row">
				<div class="col s1 m1 l1">
					<i class="mdi-alert-error small"></i>
				</div>
				<div class="col s11 m11 l11">
					After Company details are deleted, it needs to be approved by the Chief Coordinators. To see the status of the companies go to All Companies tab.
				</div>
			</div>
			<input type="hidden" value="<?php echo $company['id']; ?>" name="company">
			<div class="row center">
				<button type="submit" class="btn">Delete Company</button>
			</div>
		</form>
	</div>
</div>
