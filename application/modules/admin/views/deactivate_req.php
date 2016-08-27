<title>Deactivation Rrquests | TAPS NITW</title>
<h3>Deactivation Requests</h3>
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
		<th>Deactivation Status</th>
	</tr>
	</thead>
	<tbody>
		 

           	<?php foreach ($req as $row) : ?>
           		<tr>
           			<td><?php echo $row['userid'] ?></td>
           			<td><?php echo $row['registration_number'] ?></td>
           			<td><?php echo $row['first_name'] ?></td>
           			<td>
			 		<?php if($row['deactivate_status']==1):?>
			 		<div class="status<?php echo $row['userid'] ?>" >
			 		<button class="btn waves-effect waves-light teal lighten-2 col s6" id="<?php echo  $row['userid'] ?>" onclick="approve(<?php echo  $row['userid'] ?>)" name="action">approve</button>
			 		<button class="btn waves-effect waves-light col s6"  id="<?php echo  $row['userid'] ?>" onclick="dismiss(<?php echo  $row['userid'] ?>)" type="submit" name="action">dismiss</button>
			 	    <?php elseif($row['deactivate_status']==2): ?>
			 	    <button  class='btn green'>approved</button>
			 	     <?php elseif($row['deactivate_status']==3): ?>
                    <button  class='btn red'>dismissed</button>
                  	<?php endif; ?>
			 		</div>
			 		</td>
			 	</tr>
			 <?php endforeach; ?>
			</tbody>
		</table>
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#download_button').on('click',function(e){
			$(".table2excel").table2excel({
				exclude:'noExl',
				name:'Deactivation_Req',
				fileext:'xls',
				exclude_img:true,
				exclude_links:true,
				exclude_input:true
			});

		});
	});
</script>

           	


	 
<script type="text/javascript">
	
	function approve(y)
	{
		var z=".status"+y;
		$.ajax(
		{
			url:"<?php echo base_url('admin/deactivate_approve')?>",
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

	function dismiss(y)
	{
		var z=".status"+y;
		$.ajax(
		{
			url:"<?php echo base_url('admin/deactivate_dismiss')?>",
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