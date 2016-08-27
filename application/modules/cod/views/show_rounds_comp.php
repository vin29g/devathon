<div class="row">
	<div class="col s6">
	<h2><?php echo $result[0]['name'];?><hr></h2>
	</div>
	<div class="col s5 offset-s1" style="padding:2em">
		<div class="row">
				<button class="btn-floating  waves-effect waves-light green"  id="<?php echo $result[0]['visit_id'];?>" onclick="upgrade(<?php echo $result[0]['visit_id']?>)" name="action"><b>+</b></button> 
				<button class="btn-floating  waves-effect waves-light red"  id="delete" onclick="dismiss_stuff(<?php echo $result[0]['visit_id']?>)" name="action"><b>-</b></button>
				<button class="btn waves-effect waves-light"  id="final" onclick="final(<?php echo $result[0]['visit_id']?>)" name="action"><b>Final</b></button>
		</div>
		<div class="row">
			<div class="col s10">
				<button class="waves-effect waves-light btn modal-trigger" href="#modal1" onclick="history(<?php echo $result[0]['visit_id']?>)"><b>Check Round History</b></button>
			</div>
		</div>
	</div>
</div>
 <div class="row">
 	<div class="col s6" style="border-width:thin;">
 		<h5>Company Details</h5><hr>
 		<p><b>VisitId:</b><?php echo $result[0]['visit_id'];?></p>
 		<p><b>Title:</b><?php echo $result[0]['title'];?></p>
 		<p><b>Session:</b><?php switch ($result[0]['session_id']) {
                        case 1:
                          echo "Summer Intern";
                          break;
                        case 2:
                          echo "Winter Intern";
                          break;
                        case 3:
                          echo "Placement";
                          break;  
                        default:
                          echo "Nothing";
                          break;
                      }?></p>
        <p><b>Designation:</b><?php echo $result[0]['designation'];?></p>
 	</div>
<form method="post"id="form1">
 	<div class="col s6">
 		<h5>Rounds Detail</h5><hr>
 		<br>
 		 <div class="round_status">
 			<br>
 			<h5>
 			<div class="col s8">
 				<div class="cur_round">Round <?php echo $result[0]['round_no'];?></div> 
 			 </h5>
 		</div>
 			<div class="col s3">
          	<div class="data"><input type="text" name='inp1' value="<?php echo $result[0]['round_name'] ?>"></div>
          <div class="data_hid"><input value="<?php echo $result[0]['round_no'] ?>" name="hid" hidden></div>
          </div>
 			<br>
 	</div>
 	<button class="btn waves-effect waves-light col green"  id="<?php echo $result[0]['visit_id'] ?>" name="action"><b>Finalize</b></button>
   </form>
  <div id="modal1" class="modal">
    <div class="modal-content">
    	<div class="history">
		</div>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
   </div>
</div>
<script type="text/javascript">
function upgrade(y)
{
var z=".cur_round";
var a=".data_hid";
var inp=".data";
$.ajax(
  {
    url: '<?php echo base_url("/cod/upgrade_round");?>',
      cache: false,
      dataType:'json',
    data:
    {
      id:y
    },
    type:"POST",
        success: function(data) {
        if(data.m1==1)
          {
            Materialize.toast('Cannot upgrade final round is set',2000,'rounded');
          }
        else
        {
          Materialize.toast('Upgraded', 3000, 'rounded');
          $(z).html(data.m2);
          $(a).html(data.m1);
          $(inp).html(data.m3);
        }
    }
  });
 }

 function dismiss_stuff(y)
{
var inp=".data";
var z=".cur_round";
var a=".data_hid";
$.ajax(
  {
    url: '<?php echo base_url("/cod/dismiss_round");?>',
    cache: false,
    dataType:'json',
    data:
    {
      id:y
    },
    type:"POST",
        success: function(data) {
        	if(data.m2==-1)
        	{
        		Materialize.toast('Cannot delete round it consists of existing students or cannot be reduced',2000,'rounded');
        	}
          else if(data.m1==-1)
          {
            Materialize.toast('Cannot delete final round set',2000,'rounded');       
          }
        	else
        	{
			     Materialize.toast('Deleted', 3000, 'rounded');
			     $(z).html(data.m2);
			     $(a).html(data.m1);
			     $(inp).html(data.m3);
        	}
    }
  });
}

function final(y)
{
var z=".cur_round";
$.ajax(
  {
    url: '<?php echo base_url("/cod/final_round");?>',
      cache: false,
    data:
    {
      id:y
    },
    type:"POST",
        success: function(data) {
        Materialize.toast('Last Round set', 3000, 'rounded');
        $(z).html(data);
    }
  });
}
</script>
<script type="text/javascript">
function history(y)
{
	z=".history";
	$.ajax(
  {
    url: '<?php echo base_url("/cod/history_round");?>',
      cache: false,
    data:
    {
      id:y,
    },
    type:"POST",
        success: function(data) {
        $(z).html(data);
    }
  });
}

$("form#form1").submit(function() {
    var mydata = $("form#form1").serialize();
    $.ajax({
        type: "POST",
        url: '<?php echo base_url("/cod/finalize_round");?>',
        data: mydata,
        success: function(data) {
          Materialize.toast('Changed Current Round Name',1000);
        }
    });
    return false;
});
</script>


