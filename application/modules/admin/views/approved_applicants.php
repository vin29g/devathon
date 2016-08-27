<title> Approved Applicants | TAPS NITW</title>
<div class="container">
<h3>Approved Applicants</h3>
		<table id="tab" class="responsive-table display" cellspacing="0"  width="100%">
		<thead>
			<tr>
				<th>Application ID</th>
				<th>Name</th>
				<th>Reg No</th>
				<th>CGPA</th>
				<th>Company</th>
				<th>Cutoff</th>
				<th>Contact</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach ($result as $key => $value) { if($value['status']==2){?>
	<tr>
	<td><?php echo $value['id'];?></td>
	<td><?php echo $value['first_name'].' '.$value['last_name'];?></td>
	<td><?php echo $value['registration_number'];?></td>
	<td><?php echo $value['cgpa'];?></td>
	<td><?php echo $value['comp_name'];?></td>
	<td><?php echo $value['ecg'];?></td>
	<td><?php echo $value['mobile'];?></td>
	<td>Approved</td>
	</tr>
	</tbody>
	<?php }}?>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function()
	{
		$("#tab").DataTable();
	});
</script>
