<div id="table-datatables">
<table id="tab" class="responsive-table display" cellspacing="0" cellspacing="0" width="100%">
<thead>
<tr>
<th data-field="id" id="eli">Round</th>
<th data-field="name">Name</th>
<th data-field="branch">Status</th>
</tr>
</thead>
<tbody>
<?php for ($i=1; $i <=$round; $i++) { ?>
<tr>
<td>Round <?php echo $result[$i-1]['round_no'];?></td>
<td><?php echo  $result[$i-1]['round_name']; ?></td>
<td><?php if($i==$round) echo "Current"; else echo "Cleared";?></td>
</tr>
<?php } ?>
</tbody> 
</table>
</div>
