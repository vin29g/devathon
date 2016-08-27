<title>Approve Companies | TAPS NITW</title>
<br>
<?php if($unapproved_number === 0){ ?>
<div class="row">
	<div class="col s12 m12 l12 center">
		<h4 style="margin-top: 20px">No companies that require action</h4>
		<h6 style="margin-top: 20px">Go to All Companies or back to Home Page</h6>
		<a class="btn" style="margin-top: 20px" href="<?php echo base_url('/cod/all_companies'); ?>">All Companies</a>
	</div>
</div>
<?php }else{ ?>
<div class="row center">
	<h4 id="toptitle">Company actions to be approved</h4>
</div>
<div class="row">
	<?php foreach($companies as $company){ 
		$names = explode(',',$company['name']);
		$sites = explode(',',$company['website']);
		$logos = explode(',',$company['logofilename']);
		$infos = explode(',',$company['info']);
		$oldname = $names[0];
		$oldsite = $sites[0];
		$oldlogo = $logos[0];
		$oldinfo = $infos[0];
		if(count($names) === 2){$newname = $names[1];}
		if(count($sites) === 2){$newsite = $sites[1];}
		if(count($logos) === 2){$newlogo = $logos[1];}
		if(count($infos) === 2){$newinfo = $infos[1];}
		$approved = $company['approved'];
	?>
		<div class="col s12 l6 m6" id="unapproved<?php echo $company['id']; ?>">
			<div class="card">
				<div class="card-content">
					<div class="row">
						<span class="col s12 m12 l12 card-title black-text">
							<?php
								if($approved==0){echo 'Add Company';}
								elseif($approved==2){echo 'Delete Company';}
								elseif($approved==4){echo 'Modify Company';}
							?>
						</span>
					</div>
					<div class="row">
						<div class="col s3 m3 l3">Name</div>
						<div class="col s1 m1 l1">:</div>
						<div class="col s8 m8 l8"><?php echo $oldname?></div>
					</div>
					<?php if($approved==4 && isset($newname)){ ?>
						<div class="row">
							<div class="col s3 m3 l3">New Name</div>
							<div class="col s1 m1 l1">:</div>
							<div class="col s8 m8 l8"><?php echo $newname?></div>
						</div>
					<?php unset($newname); } ?>
					<?php if(($approved == 0) || ($approved==4 && isset($newsite))){ ?>
						<div class="row">
							<div class="col s3 m3 l3">Website</div>
							<div class="col s1 m1 l1">:</div>
							<div class="col s8 m8 l8"><?php echo anchor_popup($oldsite);?></div>
						</div>
						<?php if($approved==4){ ?>
							<div class="row">
								<div class="col s3 m3 l3">New Website</div>
								<div class="col s1 m1 l1">:</div>
								<div class="col s8 m8 l8"><?php echo anchor_popup($newsite);?></div>
							</div>
						<?php unset($newsite); } ?>
					<?php } ?>
					<div class="row">
						<div class="col s3 m3 l3">Logo</div>
						<div class="col s1 m1 l1">:</div>
						<div class="col s8 m8 l8">
							<img src="<?php echo base_url('assets/images/companies/').'/'.$oldlogo; ?>" alt="<?php echo $company['name']; ?> Logo" style="max-width:50px;max-height:50px">
						</div>
					</div>
					<?php if($approved==4 && isset($newlogo)){ ?>
						<div class="row">
							<div class="col s3 m3 l3">New Logo</div>
							<div class="col s1 m1 l1">:</div>
							<div class="col s8 m8 l8">
								<img src="<?php echo base_url('assets/images/companies/').'/temp/'.$newlogo; ?>" alt="New <?php echo $company['name']; ?> Logo" style="max-width:50px;max-height:50px">
							</div>
						</div>
					<?php unset($newlogo); } ?>
					<?php if(($approved == 0) || ($approved==4 && isset($newinfo))){ ?>
						<div class="row">
							<div class="col s3 m3 l3">Description</div>
							<div class="col s1 m1 l1">:</div>
							<div class="col s8 m8 l8"><?php echo $oldinfo?></div>
						</div>
						<?php if($approved==4){ ?>
							<div class="row">
								<div class="col s3 m3 l3">New Description</div>
								<div class="col s1 m1 l1">:</div>
								<div class="col s8 m8 l8"><?php echo $newinfo?></div>
							</div>
						<?php unset($newinfo); } ?>
					<?php } ?>
				</div>
				<div class="card-action">
					<div class="row right">
						<?php if($approved == 0){/*to add*/ ?>
							<div class="col">
								<button class="btn green" onclick="takeAction('add','approve',<?php echo $company['id']; ?>)">Add</button>
							</div>
							<form class="col" method="post" action="<?php echo base_url('/cod/modify_company')?>">
								<input type="hidden" name="modifycomp" value="<?php echo $company['id']?>">
								<button class="btn blue" type="submit">Modify</button>
							</form>
							<div class="col">
								<button class="btn red" onclick="takeAction('add','reject',<?php echo $company['id']; ?>)">Reject</button>
							</div>
						<?php } ?>
						<?php if($approved == 2){/*to delete*/ ?>
							<div class="col">
								<button class="btn red" onclick="takeAction('delete','approve',<?php echo $company['id']; ?>)">Delete</button>
							</div>
							<div class="col">
								<button class="btn green" onclick="takeAction('delete','reject',<?php echo $company['id']; ?>)">Reject</button>
							</div>
						<?php } ?>
						<?php if($approved == 4){/*to modify*/ ?>
							<div class="col">
								<button class="btn green" onclick="takeAction('modify','approve',<?php echo $company['id']; ?>)">Approve</button>
							</div>
							<form class="col" method="post" action="<?php echo base_url('/cod/modify_company')?>">
								<input type="hidden" name="modifycomp" value="<?php echo $company['id']?>">
								<button class="btn blue" type="submit">Modify</button>
							</form>
							<div class="col">
								<button class="btn red" onclick="takeAction('modify','reject',<?php echo $company['id']; ?>)">Reject</button>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<script type="text/javascript">
	var request;
	var unapproved_count = <?php echo $unapproved_number; ?>;
	function takeAction(mode, action, id)
	{
		if(request)
		{
			request.abort();
		}
		request=$.ajax({url:"<?php echo base_url('admin/approve_company'); ?>",type:"post",data:'mode='+mode+'&action='+action+'&id='+id});
		request.done(function (response, textStatus, jqXHR)
		{
			unapproved_div = document.getElementById('unapproved' + id);
			unapproved_div.parentNode.removeChild(unapproved_div);
			unapproved_count--;
			badge = document.getElementById('unapproved_badge');
			badge.innerHTML = unapproved_count;
			if(unapproved_count == 0)
			{
				badge.parentNode.removeChild(badge);
				document.getElementById('toptitle').innerHTML = 'No companies require action.';
			}
		});
		request.fail(function (jqXHR, textStatus, errorThrown)
		{
			alert(textStatus + ' ' + errorThrown);
		});
	}
</script>
<?php } ?>