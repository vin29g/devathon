  <style>
    #profile{
      padding: 10px;
    }
    h3
    {
      font-family: Montserrat;
    }
    #image{
    width:auto;
    height:350px;
    min-width: 190px;
}
    </style>
<title> Upload | TAPS NITW</title>
<div class="row">

            <div class="card">
              <div class="card-content">
                <div class="row">

<div class="col s10 center">
	<h4>Profile Pic Upload Menu</h4>
<?php echo $error;?>
   <form enctype="multipart/form-data" action="<?php echo base_url('student/upload/do_upload_photo')?>" method="post">
          <div>
              <img src="<?php if (file_exists('./assets/stud_uploads/'.$id.'.jpg')){echo base_url('assets/stud_uploads/'.$id.'.jpg');} else {echo base_url('assets/materialize/images/avatar.jpg');}?>" id="image">
          </div>
          <input type="file" name="userfile" id="profile_image" size="20" onchange="readURL(this)" />   
          <br /><br />
          <input type="hidden" name="x1" value="" />
          <input type="hidden" name="y1" value="" />
          <input type="hidden" name="x2" value="" />
          <input type="hidden" name="y2" value="" />
          <input type="hidden" name="width" value=""/>
          <button id="upl" class="btn waves-effect waves-light" type="submit">Upload</button>
        </form>
</div>
                </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
  $('#upl').prop('disabled', true);
    $('img#image').imgAreaSelect({
        aspectRatio: '3:4',
        onSelectEnd: function (img, selection) {
            $('input[name="x1"]').val(selection.x1);
            $('input[name="y1"]').val(selection.y1);
            $('input[name="x2"]').val(selection.width);
            $('input[name="y2"]').val(selection.height);            
        }
    });
});
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('image').src=e.target.result;
            $('input[name="width"]').val(document.getElementById('image').width);
            $('#upl').prop('disabled', false);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

