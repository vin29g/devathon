<title> Modify Rounds | TAPS NITW</title>
<div style="padding-left:300px">
		<div class="container" style="padding-left:100px">
			<br><br>
			<h4> Company Visit </h4>
			<br>
			<form action="cod/modify_round_visits" method="POST">
				<div class="row">
					<div class="input-field col s12 l6">
						<input id="visit_id" type="text" name="visit_id" class="validate" required>
						<label for="visit_id">Company Id</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12 l6">
						<input id="round_no" type="number" name="round_no" class="validate" required>
						<label for="round_no">Round no</label>
					</div>
				</div>



				<div class="row">
					<div class="input-field col s12 l6">
						<input id="round_name" type="text" name="round_name" class="validate" required>
						<label for="round_name">Round Name</label>
					</div>
				</div>



				<button class="btn waves-effect waves-light" type="submit" name="action">
					<i class="material-icons right">send</i>
				</button>
			</form>

		</div>
	</div>