<title> Lock Profile | TAPS NITW</title>
<h3>Profile Lock</h3>
<hr>
<div class="row">
      <button class="btn waves-effect waves-light col s1 offset-s10" id="download_button">Excel</button>
</div>
<table id="data-table-simple" class="responsive-table display table2excel" cellspacing="0">
	<thead>
		<tr>
        <th>Student ID</th>
		<th>Registration Number</th>
		<th>Name</th>
		<th>Profile Status</th>
	</tr>
	</thead>
	<tbody>
		 
			 <?php for ($i=0; $i <$rowcount ; $i++) {?>
			<tr>
				<td><?php echo $result[$i]['userid'];?></td>
				<td><?php echo $result[$i]['registration_number'];?></td>
				<td><?php echo $result[$i]['first_name'];?></td>
				<td>
					<div class="status<?php echo $result[$i]['userid'] ?>" >
					<?php if ($result[$i]['approved']==2) {?>
					<button class="btn waves-effect waves-light green col s6" id="<?php echo  $result[$i]['userid'] ?>">Unlocked</button>
					<?php }elseif ($result[$i]['approved']==1) {?>
					<button class='btn waves-effect waves-light red'>Locked</button>
					
					<?php }elseif ($result[$i]['approved']==0) {?>
					<button class='btn waves-effect waves-light orange'>NOT FILLED</button>
						<?php }?>
					</div>
				</td>
			</tr>
		 <?php }?>
	</tbody>
</table>
<script src="<?php echo base_url()?>assets/materialize/js/jquery.table2excel.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#download_button').on('click',function(e){
			$(".table2excel").table2excel({
				exclude:'noExl',
				name:'Profilelock',
				fileext:'xls',
				exclude_img:true,
				exclude_links:true,
				exclude_input:true
			});

		});
	});
</script>
