<div class="rowcenter">
	<h4 align="center">Submit Complaint Details</h4>
</div>
<br>
<div class="row">
	<div class="col s12 m12 l12">
		<form id="visitform" method="post" action="<?php echo base_url('student/get_data')?>">
			<div class="row">
				<div class="col s12 m10 l8 offset-m1 offset-l2">
					<label for="company_id">Complaint Regarding</label>
					<select id="complain_id" name="complain_id" class="browser-default" required>
						<?php foreach($complaints as $complaint){ ?>
							<option value="<?php echo $complaint['compId'];?>"><?php echo $complaint['compName'];?></option>
						<?php } ?>
					</select>
				</div>
			</div>
				<div class="row">
				<div class="input-field col s12 m10 l8 offset-m1 offset-l2">
					<textarea id="otherinfo" class="materialize-textarea" name="otherinfo" form="visitform"></textarea>
					<label for="otherinfo">Comment Your Problem</label>
				</div>
			</div>
			<br>
			<div class="row center">
				<button type="Submit" class="btn">Submit</button>
			</div>
		</form>
	</div>