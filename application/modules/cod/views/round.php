<!DOCTYPE html>
<html>
<head>
<title> Round | TAPS NITW</title>
<style>

</style>
<script>
$(document).ready(function(){
    $("#company").change(function(){
    	var company=$(this).val();
        if(company)
        {
        	$.ajax({
        		url:'<?php echo base_url("cod/round_res");?>',
        		data: "company=" + company,
                type:"POST",
        		success:function(data)
        		{
        			$('.result').html(data);
        		}
        	})
        }
    });
});
</script>
</head>
<body>
<div class="container">
<h3>Round Details</h3>
<hr>
<br><br/>
<div class="input-field col s12">
    <select name="company" id="company">
    	<option value="none" selected>Select</option>
    	<?php for ($i=0; $i <$rowcount; $i++) { ?>
      	<option value="<?php echo $result[$i]['id'] ?>"><?php echo $result[$i]['name'] ?></option>
      <?php } ?>
    </select>
    <label>Select Company and Go</label>
  </div>
  <br>
  <div class="result"></div>
<script type="text/javascript" src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js')?>"></script>
</body>
</html>