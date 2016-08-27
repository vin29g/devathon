<h1>QUESTIONS</h1>
<ul>
	<li>a</li>
	<li>b</li>
	<li>a</li>
	<li>b</li>
	<li>a</li>
	<li>b</li>
	<li>a</li>
	<li>b</li>
</ul>

<form method="post" action="<?php echo base_url('/student/feedback') ?>">

 <input type="text" name="visit_id" value=<?php echo $visit_id;?> hidden></input>
 
     
      <div class="row">
        <div class="input-field col s6">
          <textarea id="textarea1" name="desc" minlength=50 class="materialize-textarea"></textarea>
          <label for="textarea1">Textarea</label>
        </div>
      </div>
  
  
        
   
 <button class="btn waves-effect waves-light" type="submit" name="action">
 			<i class="material-icons right">Send</i>
 </button>
</form>