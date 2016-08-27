<title> Report View | TAPS NITW</title>
<div>
  <div class="container">
    <div class="row">
    <h3><strong>Report Generation</strong></h3>
    <hr>
    <p>Based on the following data,tick any number of fields to generate the report.</p>
    <form class="form container" action="<?php echo base_url('cod/reportgen');?>" method="post">
    <div class="row">
      <p class="col s12">Default Fields</p>
      <p class="col s4">
        <input type="checkbox" id="test7" checked="checked" disabled="disabled" />
        <label for="test7">RegNo</label>
      </p>
      <p class="col s4">
        <input type="checkbox" id="test7" checked="checked" disabled="disabled" />
        <label for="test7">Name</label>
      </p>
      <p class="col s4">
        <input type="checkbox" id="test7" checked="checked" disabled="disabled"/>
        <label for="test7">Company(Applied for)</label>
      </p>
    </div>
    <hr>
    <div class="row">
      <div class="col s6">
        <input type="checkbox" name="cgpa" id="cgpa" value="1"/>
        <label for="cgpa">CGPA</label>
      </div>
      <div class="col s6">
        <input type="checkbox" name="dname" id="branch" value="1"/>
        <label for="branch">Branch</label>
      </div>
    </div>
    <div class="row">
      <div class="col s6">
        <input type="checkbox" name="email" id="email" value="1"/>
        <label for="email">Email</label>
      </div>
      <div class="col s6">
        <input type="checkbox" name="category_id" id="catg" value="1"/>
        <label for="catg">Category</label>
      </div>
    </div>
    <div class="row">
    <div class="col s6">
        <input type="checkbox" name="mobile" id="mobile" value="1"/>
        <label for="mobile">Mobile Number</label>
      </div>
      <div class="col s6">
        <input type="checkbox" name="gender" id="gen" value="1"/>
        <label for="gen">Gender</label>
      </div>
    </div>
    <div class="row">
      <div class="col s6">
        <input type="checkbox" name="birthday" id="birth" value="1"/>
        <label for="birth">Birthday</label>
      </div>
    </div>
    <div style="padding-left:250px">
      <button class="btn waves-effect waves-light" type="submit" name="action">SEND</button>
    </div>
    </form>       
    </div>
  </div>
</div>