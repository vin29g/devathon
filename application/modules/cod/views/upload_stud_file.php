<h2>Upload Student list</h2>
<hr>
<h5>Select year of graduation</h5>
<div class="row"> 
	<div class="col s6 m6 l6">
		<input type="date" class="datepicker">
	</div>
</div>

<br>
<h5>Select Course</h5>

<br>
<h5>Select Branch</h5>
<br>
<h5>Select Specialisation</h5>
<br>
<form action="form-elements.html#">
	<div class="file-field input-field">
		<input class="file-path validate" type="text">
		<div class="btn">
			<span>File</span>
			<input type="file">
		</div>
	</div>
</form>
<div class="col s12 m6 l6">
	<label>Application format : </label>
	<input type="radio" name="app_format" value="1" id="inst">
	<label for="inst">Institute</label>
	<input type="radio" name="app_format" value="2" id="comp">
	<label for="comp">Company</label>
</div>
</div>
<div class="row" id="app_link_div" style="display : none">
	<div class="input-field col s12 m12 l12">
		<input id="app_link" type="url" length="36" name="app_link" class="validate">
		<label for="app_link" id="app_link_label">Application Link</label>
	</div>
</div>
<script type="text/javascript">
var applink = document.getElementById('app_link');
var applinkdiv = document.getElementById('app_link_div');

$("input[name=app_format]").change(function()
{
	if($("input[name=app_format]:checked").val() == 2)
	{
		applinkdiv.style.display = "block";
		applink.required = true;
	}
	else
	{
		applinkdiv.style.display = "none";
		applink.required = false;
	}
});
</script>