<title>Feedback List | TAPS NITW</title>
<h3>Feedback List </h3>
 
<table id="data-table-simple" class="responsive-table display" cellspacing="0">
	<thead>
		<tr>
        <th>Sr.no</th>
		<th>company name</th>
		<th>Visit id</th>
		<th>Feedback Status</th>
	</tr>
	</thead>
	<tbody>
		 <?php  $i=1;foreach ($res as $row) : ?>
           		<tr>
           			<td><?php echo $i++; ?></td>
           			<td><?php echo $row['name'];?></td>
           			<td><?php echo $row['visit_id']; ?></td>
           			<td>
			 		<?php if($row['feedback']==1): ?>
			 	    <a  class='btn btn green'>completed</button>
			 	     <?php elseif($row['feedback']==0): ?>
                    <a href="<?php echo base_url('/student/feedback_form/'.$row['visit_id']);?>" class='btn btn red'>fill</button>
                  	<?php endif; ?>
			 		</div>
			 		</td>
			 	</tr>
			 <?php endforeach; ?>
			</tbody>
		</table>

           	


	 