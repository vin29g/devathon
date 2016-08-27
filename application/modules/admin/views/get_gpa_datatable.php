
 
<h2><?php if($status==0) echo "PENDING REPORTS";
          elseif($status==1) echo "APPROVED REPORTS";
          elseif($status==-1) echo "DISMISSED REPORTS";
          ?></h2>
<div class="row">
      <button class="btn waves-effect waves-light col s2 offset-s10" id="download_button">Excel</button>
</div>
<div id="table-datatables">
<table id="tab" class="responsive-table display table2excel" cellspacing="0" cellspacing="0" width="100%">
	<thead>
		<tr>
        <th>ID</th>
        <th>Name</th>
        <th>reg_no</th>
        <th>dept</th>
		<th>SEM1SG</th>
		<th>SEM2SG</th>
		<th>SEM3SG</th>
		<th>SEM4SG</th>
		<th>SEM5SG</th>
		<th>SEM6SG</th>
		<th>SEM7SG</th>
		<th>CGPA</th>
		<th col s4>Verification Status</th>
	</tr>
		
	</thead>
	<tbody>
		 
			 <?php foreach ($query as $row) :?>
			 <tr>
			 	<td><?php echo $row['userid'] ?></td>
			 	<td><?php echo $row['name'] ?></td>
			 	<td><?php echo $row['reg_number'] ?></td>
			 	<td><?php echo $row['dept_name'] ?></td>
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
			 		<button class="btn waves-effect waves-light teal lighten-2 col s6" id="<?php echo  $row['userid'] ?>" onclick="approve(<?php echo  $row['userid'] ?>)" name="action">aprove</button>
			 		<button class="btn waves-effect waves-light  col s6"  id="<?php echo  $row['userid'] ?>" onclick="dismiss(<?php echo  $row['userid'] ?>)" name="action">dismiss</button>
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
</script>
<script type="text/javascript">
	$(document).ready(function()
	{
		<?php switch ($status) {
			case 0:$pr='PendingGPA';
				break;
			case 1:$pr='DismissedGPA';
				break;
			case 2:$pr='ApprovedGPA';
				break;
		}?>
		$("#tab").DataTable();
		$('#download_button').on('click',function(e){
			$(".table2excel").table2excel({
				exclude:'noExl',
				name:'<?php echo $pr ?>',
				fileext:'xls',
				exclude_img:true,
				exclude_links:true,
				exclude_input:true
			});

		});
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

