<title> Upload CSV | TAPS NITW</title>
</br>
<div class="col s6">
<div class="left-align" > 
<a class='dropdown-button blue btn' href='#' data-activates='dropdown1'>Select Branch</a>

  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <li><a class="blue-text" href="<?php echo base_url('/upload/upload/upload_file/cse')?>">CSE </a></li>
    <li><a class="blue-text" href="<?php echo base_url('/upload/upload/upload_file/ece')?>">ECE</a></li>
    <li><a class="blue-text" href="<?php echo base_url('/upload/upload/upload_file/eee')?>">EEE</a></li>
    <li><a class="blue-text" href="<?php echo base_url('/upload/upload/upload_file/mech')?>">Mech</a></li>
    <li><a class="blue-text" href="<?php echo base_url('/upload/upload/upload_file/chem')?>">Chemical</a></li>
    <li><a class="blue-text" href="<?php echo base_url('/upload/upload/upload_file/civil')?>">Civil</a></li>
    <li><a class="blue-text" href="<?php echo base_url('/upload/upload/upload_file/meta')?>">Meta</a></li>
  </ul>
        
	

</div>
</div>
<div class ="col s6 offset-s6">
<div class="right-align"> 
  <a class="waves-effect waves-light blue btn" href="<?php echo base_url('/cod/download_sample')?>">Download Sample csv</a>
</div>
  </div>
  <?php  
  $this->load->helper('html');
  echo " The following names have been omitted due to repitition.Please contact Admin for further details <br>";
  foreach($name as $item)
         echo $item;
       echo "<br>";
             ?>