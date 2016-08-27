<?php $sno=1?>
<h3>Upload Result</h3>
<hr>
<div class="col s12" align="right">
        <a class="waves-effect waves-light  btn" href="<?php echo base_url("/admin/send_password/".$student[0]['specialization_id'])?>">Send Password</a>
    </div>
<h5>Branch Name :</h5><?php echo $student[0]['name']?>
<h4>Successfull Entries</h4>
	<div class="col m9">
		<table id="data-table-simple" class="responsive-table display" cellspacing="0">
			<thead>
				<tr>
					<th>Sno.</th>
					<th>roll_number</th>
					<th>registration_number</th>
					<th>user_id</th>
					<th>first_name</th>
					<th>middle_name</th>
					<th>last_name</th>
					<th>email</th>
					<th>phone</th>
					<th>username</th>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th>Sno.</th>
					<th>roll_number</th>
					<th>registration_number</th>
					<th>user_id</th>
					<th>first_name</th>
					<th>middle_name</th>
					<th>last_name</th>
					<th>email</th>
					<th>phone</th>
					<th>username</th>
				</tr>
			</tfoot>

			<tbody>
				<?php foreach($student as $value){ ?>
				<tr>
					<td><?php echo $sno;$sno+=1;?></td>
					<td><?php echo $value['roll_number']?></td>
					<td><?php echo $value['registration_number']?></td>
					<td><?php echo $value['user_id']?></td>
					<td><?php echo $value['first_name']?></td>
					<td><?php echo $value['middle_name']?></td>
					<td><?php echo $value['last_name']?></td>
					<td><?php echo $value['email']?></td>
					<td><?php echo $value['phone']?></td>
					<td><?php echo $value['username']?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>