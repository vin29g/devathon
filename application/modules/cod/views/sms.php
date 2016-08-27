<br>
<?php if(isset($sent)){ ?>
<div class="modal" id="sent">
	<div class="modal-content">
		Message <?php if(!$sent){echo 'not';} ?> sent.
	</div>
</div>
<?php } ?>
<div class="row center">
	<h4>Send SMS</h4>
</div>
<div class="row">
	<div class="col s12 m10 l8 offset-m1 offset-l2">
		<form method="post" action="<?php echo base_url('cod/sms')?>">
			<div class="row">
				<div class="col s12 m12 l12">
					<label for="usermode">Select the users</label>
					<select id="usermode" name="usermode" class="browser-default" required>
						<option value="1"><?php echo $branch; ?> students</option>
						<option value="2">Specific students</option>
						<?php if($this->ion_auth->in_group('admin')){ ?>
						<option value="3">Branch wise</option>
						<option value="4">All</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row" id="branchselectdiv" style="display:none">
				<div class="col s12 m12 l12">
					<label for="branchselect">Select Branch</label>
					<select id="branchselect" name="branchselect" class="browser-default">
						<?php foreach($departments as $dept){ ?>
							<option value="<?php echo $dept['id']; ?>"><?php echo $dept['name']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row" id="specificdiv" style="display:none">
				<h5>Give registration number of the students</h5>
				<div class="input-field col s12 m12 l12" id="specificcontainer">
					<button class="btn" onclick="addSpecific()">Add</button>
					<input id="number1" name="number1" type="number">
				</div>
				<input type="hidden" value="1" name="no_students" id="no_students">
			</div>
			<div class="row">
				<div class="col s12 m12 l12 input-field">
					<textarea id="message" class="materialize-textarea" name="message" required></textarea>
					<label for="message">Message</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12 l12 center">
					<button type="submit" class="btn">Send Message</label>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	var BranchSelectDiv = document.getElementById('branchselectdiv');
	var BranchSelect = document.getElementById('branchselect');

	var numberOfSpecific = 1;
	var SpecificDiv = document.getElementById('specificdiv');
	var SpecificContain = document.getElementById('specificcontainer');
	var SpecificInput = document.getElementById('number1');
	var SpecificCount = document.getElementById('no_students');

	var UserMode=document.getElementById('usermode');

	$("#usermode").change(function()
	{
		if(UserMode.value == 1 || UserMode.value == 4)
		{
			hideBranchSelect();
			hideSpecific();
		}
		else if(UserMode.value == 2)
		{
			hideBranchSelect();
			showSpecific();
		}
		else if(UserMode.value == 3)
		{
			hideSpecific();
			showBranchSelect();
		}
	});

	function hideBranchSelect()
	{
		BranchSelectDiv.style.display = "none";
		BranchSelect.required = false;
	}

	function showBranchSelect()
	{
		BranchSelectDiv.style.display = "block";
		BranchSelect.required = true;
	}

	function hideSpecific()
	{
		for(i=1;i<=numberOfSpecific;i++)
		{
			var numberid='number' + i;
			document.getElementById(numberid).required = false;
		}
		SpecificDiv.style.display = "none";
	}

	function showSpecific()
	{
		for(i=1;i<=numberOfSpecific;i++)
		{
			var numberid='number' + i;
			document.getElementById(numberid).required = true;
		}
		SpecificDiv.style.display = "block";
	}

	function addSpecific()
	{
		var input = document.createElement("input");
		input.type = "number";
		input.required = true;
		input.name = "number" + ++numberOfSpecific;
		input.id = "number" + numberOfSpecific;
		SpecificContain.appendChild(input);
		SpecificCount.value = numberOfSpecific;
	}
</script>