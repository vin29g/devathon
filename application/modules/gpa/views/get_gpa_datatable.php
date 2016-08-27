<title> Verify | TAPS NITW</title>
 
<h2><?php if($status==0) echo "PENDING REPORTS";
          elseif($status==1) echo "APPROVED REPORTS";
          elseif($status==-1) echo "DISMISSED REPORTS";
          ?></h2>

<div id="table-datatables">
<table id="tab" class="responsive-table display" cellspacing="0" cellspacing="0" width="100%">
	<thead>
		<tr>
        <th>Userid</th>
		<th>Sem1sg</th>
		<th>Sem2sg</th>
		<th>Sem3sg</th>
		<th>Sem4sg</th>
		<th>Sem5sg</th>
		<th>Sem6sg</th>
		<th>Sem7sg</th>
		<th>Cgpa</th>
		<th col s4>Verification Status</th>
	</tr>
		
	</thead>
	<tbody>
		 
			 <?php foreach ($query as $row) :?>
			 <tr>
			 	<td><?php echo $row['userid'] ?></td>
			 	<td><?php echo $row['sem1sg'] ?></td>
			 	<td><?php echo $row['sem2sg'] ?></td>
			 	<td><?php echo $row['sem3sg'] ?></td>
			 	<td><?php echo $row['sem4sg'] ?></td>
			 	<td><?php echo $row['sem5sg'] ?></td>
			 	<td><?php echo $row['sem6sg'] ?></td>
			 	<td><?php echo $row['sem7sg'] ?></td>
			 	<td><?php echo $row['cgpa'] ?></td>
			 	<td>
			 		<?php if($row['approval_status']==0):?>
			 		<div class="status<?php echo $row['userid'] ?>" >
			 		<button class="btn waves-effect waves-light teal lighten-2 col s6" id="<?php echo  $row['userid'] ?>" onclick="approve(<?php echo  $row['userid'] ?>)" name="action">approve</button>
			 		<button class="btn waves-effect waves-light col s6"  id="<?php echo  $row['userid'] ?>" onclick="dismiss(<?php echo  $row['userid'] ?>)" type="submit" name="action">dismiss</button>
			 	    <?php elseif($row['approval_status']==1): ?>
			 	    <button  class='btn green'>approved</button>
			 	     <?php elseif($row['approval_status']==-1): ?>
                    <button  class='btn red'>dismissed</button>
                  <?php endif; ?>
			 	</div>
			 	</td>


			 	 
		 
		     </tr>
		 <?php endforeach ;?>
	</tbody>
</table>
 
<script type="text/javascript">
	$(document).ready(function()
	{
		$("#tab").DataTable();
	});
</script>

<script type="text/javascript">
//test

function approve(y)
{
var z=".status"+y;
$.ajax(
	{
		url: '<?php echo base_url("/admin/approve_gpa_status");?>',
		dataType:'json',
		cache:false,
		data:
		{
			id:y
		},
		type:"POST",
		success:function(data){
			$(z).html(data.msg);

		}
		 

	});
 }
 function dismiss(y)
{
var z=".status"+y;
$.ajax(
	{
		url: '<?php echo base_url("/admin/dismiss_gpa_status");?>',
		dataType:'json',
		cache:false,
		data:
		{
			id:y
		},
		type:"POST",
		success:function(data){
			$(z).html(data.msg);

		}
		 

	});
 }

 function revert(y)
 {
 	var z=".status"+y;
$.ajax(
	{
		url: '<?php echo base_url("/admin/revert_gpa_status");?>',
		dataType:'json',
		cache:false,
		data:
		{
			id:y
		},
		type:"POST",
		success:function(data){
			$(z).html(data.msg);

		}
		 

	});
 }
</script>

