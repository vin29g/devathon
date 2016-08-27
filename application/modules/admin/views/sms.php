
  <select id="dropdown1">
     <?php if($this->ion_auth->is_admin())
    echo '<option value = "1">ALL</option>';?>
    
    <option value = "2">Option Branch</option>

    <option value = "3">Custom</option>
  </select>
  <select id="dropdown2">
    <option value = "3">Custom</option>
<!--   <a class='dropdown-button btn' href='#' data-activates='dropdown2'></a> -->

 <!--  <ul id='dropdown2' class='dropdown-content'>
  </ul>

  <ul id='dropdown3' class='dropdown-content'>
  </ul> -->
</select>
