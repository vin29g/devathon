<title> Admin | TAPS NITW</title>
<div>
	<div class="row">
        <div class="col s12 m4">
        	<div class="card blue darken-3">
            <div class="card-content white-text flow-text">
              <span class="card-title">All Applications</span>
              <div class="card-body"><?php echo $rowcount;?></div>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue darken-3">
            <div class="card-content white-text flow-text">
              <span class="card-title"><a class="white-text" href="<?php echo base_url('admin/approved_appl');?>"><u>Approved</u></a><small>  Administrator</small></span>
              <div class="card-body" id="apa"><?php $apa=0;for ($i=0; $i <$rowcount ; $i++) {if($result[$i]['status']==2)$apa++;   } echo $apa;?></div>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue darken-3">
            <div class="card-content white-text flow-text">
              <span class="card-title">Approved</a><small>  Co-ordinator</small></span>
              <div class="card-body" id="apc"><?php $i=0;$apc=0; for ($i=0; $i <$rowcount ; $i++) {if($result[$i]['status']==1 || $result[$i]['status']==2) $apc++;} echo $apc;?></div>
            </div>
          </div>
        </div>
      </div>
	<hr>
	<div class="row">
		<div class="col s10">
			<h5>Approved by Co-ordinator</h5>
			<p><blockquote>Note:Following table is gpa verified filtered by you</blockquote></p>
			<p>First verify GPA</p>
		</div>
		<div class="col s2" style="padding:1em;">Current Round:<?php echo $round_no;?>
		</div>
	</div>
	<div id="table-datatables">
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
		 
			 <?php for ($i=0; $i <$rowcount ; $i++) { if($result[$i]['status']==1){?>
			 <tr>
			 	<td><a class="modal-trigger" href="#<?php echo $result[$i]['id'];?>"><?php echo $result[$i]['id'];?></a></td>
			 	<td><?php echo $result[$i]['first_name'].' '.$result[$i]['last_name'];?></td>
			 	<td><?php echo $result[$i]['registration_number'];?></td>
			 	<td><?php echo $result[$i]['cgpa'];?></td>
			 	<td><?php echo $result[$i]['comp_name'];?></td>
			 	<td><?php echo $result[$i]['ecg'];?></td>
			 	<td><?php echo $result[$i]['mobile'];?></td>
			 	<td>
			 		<div class="status<?php echo $result[$i]['id'] ?>" >
			 		<button class="btn waves-effect waves-light teal lighten-2 col s5" id="<?php echo  $result[$i]['id'] ?>" onclick="approve(<?php echo  $result[$i]['id'] ?>)" name="action">approve</button>
			 		<button class="btn waves-effect waves-light col s4"  id="<?php echo  $result[$i]['id'] ?>" onclick="dismiss(<?php echo  $result[$i]['id'] ?>)" type="submit" name="action">dismiss</button>
			 	</div>
			 	<div class="revert"></div>
			 	</td>
		     </tr>
  <!-- Modal Structure -->
  			<div id="<?php echo $result[$i]['id'];?>" class="modal modal-fixed-footer">
  			  <div class="modal-content">
  			  <div class="card blue darken-3">
  			  <div class="card-content white-text">
   			   <h4>Application No.<?php echo $result[$i]['id'];?></h4>
   			   	</div>
   			   </div>
   			    <hr>
    			 <div class="row">
    			 	<div class="col s6" style="border-right:solid;border-width:thin;">
    			 		<h5>Student Details</h5><hr>
    			 		<p><b>Name:</b><?php echo $result[$i]['name'];?></p>
    			 		<p>Specialization:<?php echo $result[$i]['id'];?></p>
    			 		<p>Company:<?php echo $result[$i]['comp_name'];?></p>
    			 	</div>
    			 	<div class="col s6">
    			 		<h5>Company Details</h5><hr>
    			 		<p>Name:<?php echo $result[$i]['name'];?></p>
    			 		<p>Specialization:<?php echo $result[$i]['id'];?></p>
    			 		<p>Company:<?php echo $result[$i]['comp_name'];?></p>
    			 	</div>
    			 </div>
   			 </div>
   			 <div class="modal-footer">
   		     <a href="#<?php echo $result[$i]['id'];?>" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    		</div>
 		    </div>
		 <?php }}?>
	</tbody>
</table>
	<!-- Modal Structure for approved admin -->
	<div id="modal2" class="modal modal-fixed-footer">
		<div class="modal-content">

	 </div>
 </div>

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
		url: '<?php echo base_url("/admin/approve_application");?>',
		dataType: 'json',
    	cache: false,
		data:
		{
			id:y
		},
		type:"POST",
				success: function(data) {
				$("#apa").html(data.m1);
				$(z).html(data.m2);
    }


	});
 }
 function dismiss(y)
{
var z=".status"+y;
$.ajax(
	{
		url: '<?php echo base_url("/admin/dismissed_application");?>',
		dataType: 'json',
    	cache: false,
		data:
		{
			id:y
		},
		type:"POST",
				success: function(data) {
				$(z).html(data.m2);
    }


	});
 }

 function revert(y)
 {
 	var z=".status"+y;
 	$.ajax(
	{
		url: '<?php echo base_url("/admin/revert");?>',
		dataType:'json',
		cache:false,
		data:
		{
			id:y
		},
		type:"POST",
		success: function(data) {
		$('#apa').html(data.rm1);
		$(z).html(data.rm2);
    }
	});
 }
</script>
