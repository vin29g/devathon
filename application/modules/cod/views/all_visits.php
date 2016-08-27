<title>All Visits | TAPS NITW</title>
<br>

<?php if(count($visits) === 0): ?>
<div class="row">
	<div class="col s12 m12 l12 center">
		<br>
		<h4 style="margin-top: 20px">No company visits to show</h4>
		<h6 style="margin-top: 20px">Go to add company visit page to add company visits</h6>
		<a class="btn" style="margin-top: 20px" href="<?php echo base_url('cod/add_visit')?>">Add Company Visit</a>
	</div>
</div>
<?php else:?>
<div class="row center">
	<h4>All Company Visits</h4>
</div>
<div class="row">
	<?php foreach($visits as $visit) { if($visit['approved'] == 1){ ?>
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
						<div class="col s8 m8 l8">
				 		<?php echo $visit['designation'];?>
				 		</div>
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
					<div class="row right">
						<form class="col" action="<?php echo base_url('/cod/modify_visit');?>" method="post">
							<input type="hidden" name="modify_id" value="<?php echo $visit['id'];?>">
							<button class="btn" type="submit">Modify</button>
						</form>
						<div class="col">
							<button class="btn" onclick="delete_visit(<?php echo $visit['id']; ?>)">Delete</button>
						</div>
					</div>
				 </div>
			</div>
		</div>
	<?php }} ?>
</div>
<?php endif ?>

<?php if(isset($visit_modified)){ ?>
<div class="modal center" id="modified_banner">
	<div class="modal-content">
		<h5>Company visit <?php if(!$visit_modified){echo 'not ';} ?>modified</h5>
	</div>
</div>
<script type="text/javascript">
	$("#modified_banner").openModal();
</script>
<?php } ?>

<div class="modal center" id="deleted_banner">
	<div class="modal-content">
		<h5>Company visit deleted</h5>
	</div>
</div>
<div class="modal center" id="not_deleted_banner">
	<div class="modal-content">
		<h5>Company visit not deleted</h5>
	</div>
</div>

<script type="text/javascript">
	var request;
	function delete_visit(id)
	{
		if(request)
		{
			request.abort();
		}
		request=$.ajax({url:"<?php echo base_url('cod/delete_visit')?>",type:"post",data:"delete_id="+id});
		request.done(function (response, textStatus, jqXHR)
		{
			$("#deleted_banner").openModal();
			visit_div = document.getElementById('visit_div' + id);
			visit_div.parentNode.removeChild(visit_div);
		});
		request.fail(function (jqXHR, textStatus, errorThrown)
		{
			$("#not_deleted_banner").openModal();
		});
	}
</script>