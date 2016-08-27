<title> Upload | TAPS NITW</title>
<div class="row">

        <div class="col s12 m12 l12">
          <div class="z-depth-2">
            <div class="card">
              <div class="card-content">
                <div class="row">
                 

                </div>
                <div class="row">

<h3>Your file was successfully uploaded!</h3>
<!-- $data[userid] should be filename in specific formate. -->
 
<img img border="1" src="<?php echo base_url('/assets/stud_uploads/'.$this->upload->data('file_name'));?>" width="259" height="233" />
<button type="button" class="btn btn-danger" onclick="<?php echo base_url()?>stud/upload/delete_pic">Delete pic</button>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('student/upload/upload_photo', 'Upload new file(It will replace this photo)'); ?></p>

                </div>

