<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/imgareaselect-default.css" />
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery.imgareaselect.pack.js"></script>
<title> Upload | TAPS NITW</title>
<div class="row">

        <div class="col s12 m12 l12">
          <div class="z-depth-2">
            <div class="card">
              <div class="card-content">
                <div class="row">
                 

                </div>
                <div class="row">

<div style="left:50%;right:50%;top:50%;">
	<h4>Profile Pic Upload Menu</h4>
<hr>
<?php echo $error;?>

<?php echo form_open_multipart('student/upload/do_upload_photo');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
</div>
                </div>
</div>
<script type="text/javascript">
function getSizes(im,obj)
	{
		var x_axis = obj.x1;
		var x2_axis = obj.x2;
		var y_axis = obj.y1;
		var y2_axis = obj.y2;
		var thumb_width = obj.width;
		var thumb_height = obj.height;
         var img =$("#image_name").val();
		if(thumb_width > 0)
			{
				if(confirm("Do you want to save image..!"))
					{
						$.post('<?php echo base_url();?>welcome/updatecropimage/',
                                                  {
                                                   x_axis : x_axis,
                                                   y_axis : y_axis,
                                                   thumb_width:thumb_width,
                                                   thumb_height:thumb_height,
                                                   img :img
                                                  },
                                                  function(data)
						  {
                                                     // alert(data);
						    $("#cropimage").show();
						    //$("#thumbs").html("");
						    $("#thumbs").html("<img src='<?php echo base_url();?>uploads/"+data+"' />");
						  });

	                               }
                         }
                         }

$(document).ready(function () {
    $('img#photo').imgAreaSelect({
        aspectRatio: '1:1',
        onSelectEnd: getSizes
    });
});
</script>
<style>
.cropimage
{
 background-color: aquamarine;
 alignment-adjust: central;
}
.animate
{
	transition: all 0.1s;
	-webkit-transition: all 0.1s;
}

.action-button
{
	position: relative;
	padding: 10px 40px;
  margin: 0px 10px 10px 0px;
  float: left;
	border-radius: 10px;
	font-family: 'Pacifico', cursive;
	font-size: 14px;
	color: #FFF;
	text-decoration: none;	
}


.red
{
	background-color: #E74C3C;
	border-bottom: 5px solid #BD3E31;
	text-shadow: 0px -2px #BD3E31;
}


.action-button:active
{
	transform: translate(0px,5px);
  -webkit-transform: translate(0px,5px);
	border-bottom: 1px solid;
}
.yellow
{
	background-color: #F2CF66;
	border-bottom: 5px solid #D1B358;
	text-shadow: 0px -2px #D1B358;
        float: left;
}
</style>
 <?php echo form_open_multipart('welcome/cropimage');?>
<div id="cropimage"  class="cropimage">
 <table width="958">
 
  <tr>
      <td><h1>Image Upload</h1></td>
      <td><input type="file" name="userfile" name="userfile"></td>
   
    <td><input type="hidden" name="image_name" id="image_name" value="<?php echo $img; ?>" ></td>
   </tr>
  <br>
   <tr>
    <td>
    <td><input type="submit" value="Submit" class="action-button shadow animate red"/></td>
  </tr>
 </table>
<div style="margin:0 auto; width:600px">
    <h1>Please drag on the image</h1>
    <img src='<?php echo base_url();?>/assets/stud_uploads/<?php echo $_GET["img"]; ?>.jpg' id="photo" style='max-width:500px' >

</div>
</div>
<div id="thumbs" style='max-width:500px'></div>
<?php echo form_close();?>
