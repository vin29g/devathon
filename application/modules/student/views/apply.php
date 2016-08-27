<title> Apply | TAPS NITW</title>
<style>
	input[type=text]:disabled
	{
		color: black;
	}
</style>
 	<div class="container" style="padding-left:100px">
 		<br><br>
 		<div>
 			<?php if($flag==1) echo "Done"; elseif($flag==2) echo "Already Filled";?>
 		</div>
 		<h4> Fill Up the details </h4>
 		<br>
 		<form action="applied" method="POST">
 		<div class="row">
 			<input type="hidden" name="vid" value="<?php echo $result[0]['visit_id']; ?>">
 			<div class="input-field col s12 m6 l6">
 			<input id="name" type="text" name="name" class="validate" required>
 			<label for="name">Name</label>
 			</div>
 		</div>
 		<div class="row">
 			<div class="input-field col s12 m6 l6">
 			<input id="regid" type="text" name="regid" class="validate"  required>
 			<label for="regid">Registration Number</label>
 			</div>
 		</div>
 		<div class="row">
 			<div class="input-field col s12 m6 l6">
 			<input id="cgpa" type="text" name="cgpa" class="validate" required>
 			<label for="cgpa">CGPA</label>
 			</div>
 		</div>
 		 <div class="row">
 			<div class="input-field col s12 m6 l6">
 			<input id="company_name" type="text" name="company_name" value="<?php echo $result[0]['name']; ?>" class="validate" readonly>
 			<label for="company_name">Company Name</label>
 			</div>
 		</div>
 		 <div class="row">
 			<div class="input-field col s12 m6 l6">
 			<input id="designation" type="text" name="designation"value="<?php echo $result[0]['designation']; ?>" class="validate" readonly>
 			<label for="designation">Designation</label>
 			</div>
 		</div>
 		<div class="row">
 			<div class="input-field col s12 m6 l6">
 			<input id="salary" type="text" name="salary" value="<?php echo $result[0]['salary']; ?>" class="validate" readonly>
 			<label for="salary">Salary</label>
 			</div>
 		</div>
 		<br>
         <div class="row">
 			<div class="input-field col s12 m6 l6">
 				<textarea id="other_information" class="materialize-textarea" name="other_information"></textarea>
 				<label for="other_information">Other Information</label>
 			</div>
 		</div>
		<button class="btn waves-effect waves-light" type="submit" name="action">
 			<i class="material-icons right">send</i>
 		</button>
 	</form>

 	</div>
