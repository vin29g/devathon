<html>
<head>
<title> Success| TAPS NITW</title>
</head>
<body>

<h3>Your Resume was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('admin/upload_student_list', 'Upload Another File!'); ?></p>

</body>
</html>