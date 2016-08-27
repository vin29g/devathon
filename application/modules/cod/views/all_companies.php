<title>All Companies | TAPS NITW</title>
<br>
<div class="row center">
	<h4>All Companies</h4>
</div>
<div class="row">
	<div class="row">
      <button class="btn waves-effect waves-light col s1 offset-s10" id="download_button">Excel</button>
    </div>
	<div class="col s12 m12 l12 center">
		<?php if(count($companies) === 0): ?>
			<h4>No companies to show</h4>
			<br>
			<h6>Go to add company page to add companies</h6>
			<br>
			<a class="btn" href="<?php echo base_url('cod/add_company')?>">Add Company</a>
		<?php else: ?>
			<div id="table-datatables">
				<table id="comptable" class="responsive-table display table2excel" cellspacing="2">
					<thead>
						<tr>
							<th>Name</th>
							<th>Website</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($companies as $company): ?>
							<tr>
								<td><?php $a=explode(',',$company['name']);echo $a[0];?></td>
								<td><?php echo anchor_popup($company['website']);?></td>
								<td>
									<?php
									if($company['approved'] == 0)
									{
										echo 'Waiting for approval';
									}
									elseif ($company['approved'] == 1)
									{
										echo 'Approved';
									}
									elseif ($company['approved'] == 2)
									{
										echo 'Waiting to be deleted';
									}
									elseif ($company['approved'] == 3)
									{
										echo 'Deleted';
									}
									elseif ($company['approved'] == 4)
									{
										echo 'Waiting to be modified';
									}
									?>
								</td>
								<td>
									<div class="row" style="padding : 0; margin : 0;">
										<?php if($company['approved'] == 1) { ?>
											<form class="col" method="post" action="<?php echo base_url('/cod/modify_company')?>">
												<input type="hidden" name="modifycomp" value="<?php echo $company['id']?>">
												<button class="btn" type="submit" style="margin-top:10px ; margin-bottom:10px;">Modify</button>
											</form>
											<form class="col" method="post" action="<?php echo base_url('/cod/delete_company')?>">
												<input type="hidden" name="deletecomp" value="<?php echo $company['id']?>">
												<button class="btn" type="submit" style="margin-top:10px ; margin-bottom:10px;">Delete</button>
											</form>
										<?php }else{ ?>
											<div class="col">
												<button class="btn disabled" style="margin-top:10px ; margin-bottom:10px;">Modify</button>
											</div>
											<div class="col">
												<button class="btn disabled" style="margin-top:10px ; margin-bottom:10px;">Delete</button>
											</div>
										<?php } ?>
									</div>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		<?php endif ?>
	</div>
</div>
<?php if($action != 'none') { ?>
	<div class="modal" id="modal1">
		<div class="modal-content">
			<p>Company <?php echo $action; ?>.</p>
		</div>
	</div>
<?php } ?>
<script src="<?php echo base_url()?>assets/materialize/js/jquery.table2excel.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$("#comptable").DataTable();
		<?php if($action!='none') { ?>
		$("#modal1").openModal();
		<?php } ?>
		$('#download_button').on('click', function(e){
        	$(".table2excel").table2excel({
	    	exclude: ".noExl",
	    	name: "Company",
	    	fileext: ".xls",
	    	exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
		});
    });
	});
</script>
