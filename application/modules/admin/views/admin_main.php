<title> Admin | TAPS NITW</title>
<div>
	<div class="row">
        <div class="col s12 m4">
        	<div class="card blue darken-3">
            <div class="card-content white-text flow-text">
              <span class="card-title">All Applications</span>
              <div class="card-body"><?php echo "1";?></div>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue darken-3">
            <div class="card-content white-text flow-text">
              <span class="card-title"><a class="white-text" href="<?php echo base_url('admin/approved_appl');?>"><u>Approved</u></a><small>  Administrator</small></span>
              <div class="card-body" id="apa"></div>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue darken-3">
            <div class="card-content white-text flow-text">
              <span class="card-title">Approved</a><small>  Co-ordinator</small></span>
              <div class="card-body" id="apc"></div>
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
		<div class="col s2" style="padding:1em;">Current Round
		</div>
	</div>
	<div id="table-datatables">
<!--  -->
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
<!-- 
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
 -->