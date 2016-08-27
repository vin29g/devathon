<title> Lock Profile | TAPS NITW</title>

 
<h3>Profile Lock</h3>
 
<div class="row">
<div class="input-field  col s6 offset-s6">
	<input id="selection_dt" type="date" name="selection_dt" class="datepicker" required>
	<label for="selection_dt">Set Auto lock date</label>
</div>
 

<table id="data-table-simple" class="responsive-table display" cellspacing="0">
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
					<button class="btn waves-effect waves-light teal lighten-2 col s6" id="<?php echo  $result[$i]['userid'] ?>" onclick="lock(<?php echo $result[$i]['userid'];?>)">Lock it</button>
					<?php }elseif ($result[$i]['approved']==1) {?>
					<button class='btn waves-effect waves-light green'>Locked</button><button class="btn waves-effect waves-light blue darken-2 col s6" id="<?php echo  $result[$i]['userid'] ?>" onclick="unlock(<?php echo $result[$i]['userid'];?>)">Unlock</button>
					
					<?php }elseif ($result[$i]['approved']==0) {?>
					<button class='btn waves-effect waves-light orange'>NOT FILLED</button>
						<?php }?>
					</div>
				</td>
			</tr>
		 <?php }?>
	</tbody>
</table>
<script type="text/javascript">
	

 $("#selection_dt").change(function()
 {
 	 var dat=$(this).val();
 	 alert(dat);
 	 $.ajax(
		{
			url:"<?php echo base_url('admin/set_autolock')?>",
			dataType:'json',
			cache:false,
			data:
			{
				dat:dat
			},
			type:"POST",
			success:function(data)
			{
				alert("success");
		    }
			
		});
 	 
 });
	 


	function lock(y)
	{
		var z=".status"+y;
		$.ajax(
		{
			url:"<?php echo base_url('admin/lock')?>",
			dataType:'json',
			cache:false,
			data:
			{
				id:y
			},
			type:"POST",
			success:function(data)
			{
				$(z).html(data.m1);
			}
		});
	}

	function unlock(y)
	{
		var z=".status"+y;
		$.ajax(
		{
			url:"<?php echo base_url('admin/unlock')?>",
			dataType:'json',
			cache:false,
			data:
			{
				id:y
			},
			type:"POST",
			success:function(data)
			{
				$(z).html(data.m1);
			}
		});
	}



</script>