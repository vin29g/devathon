<html>
<head>
	<title> Upload | TAPS NITW</title>
</head>
<body>

	<?php $this->load->helper('file');?>


	<div class="divider"></div>
	<div id="striped-table">
		<h4 class="header">Upload Documents</h4>
		<div class="row">
			<div class="col s12 m8 l9">
				<table class="striped">
					<thead>
						<tr>
							<th data-field="id">Sno.</th>
							<th data-field="name">Document Type</th>
							<th data-field="price">Uploaded/not Present</th>
							<th data-field="price">Delete</th>
							<th data-field="upload">Upload</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Resume</td>
							<td><?php 
							if (file_exists('./assets/uploads/documents/'.$specialization_id.'/'.$encrypt.'/resume.pdf')) 
							{
								echo "Present";
							}
							else 
								echo "Not Present";?></td>
							<td>
								<a class="blue waves-effect waves-light btn" href="<?php echo base_url('/student/upload/delete_file/1');?>">Delete</a></td>
								<td><?php echo form_open_multipart('student/upload/do_upload/resume');?><input type="file" name="userfile" size="20" /><input type="submit" value="upload resume" /></form></td>
							</tr>
							<tr>
								<td>2</td>
								<td>10th class report card</td>
								<td><?php 
								if (file_exists('./assets/uploads/documents/'.$specialization_id.'/'.$encrypt.'/10th_cert.pdf')) 
								{
									echo "Present";
								}
								else 
									echo "Not Present";?></td>
								<td>
									<a class=" blue waves-effect waves-light btn" href="<?php echo base_url('/student/upload/delete_file/2');?>">Delete</a></td>
									<td><?php echo form_open_multipart('student/upload/do_upload/10th');?><input type="file" name="userfile" size="20" /><input type="submit" value="upload 10th" /></form></td>
								</tr>
								<tr>
									<td>3</td>
									<td>12th class report card</td>
									<td><?php 
									if (file_exists('./assets/uploads/documents/'.$specialization_id.'/'.$encrypt.'/12th_cert.pdf')) 
									{
										echo "Present";
									}
									else 
										echo "Not Present";?></td>
									<td>
										<a class="blue waves-effect waves-light btn" href="<?php echo base_url('/student/upload/delete_file/3');?>">Delete</a></td>
										<td><?php echo form_open_multipart('student/upload/do_upload/12th');?><input type="file" name="userfile" size="20" /><input type="submit" value="upload 12th" /></form></td>
									</tr>
									<tr>
										<td>4</td>
										<td>SC/ST</td>
										<td><?php if (file_exists('./assets/uploads/documents/'.$specialization_id.'/'.$encrypt.'/scst.pdf')) 
										{
											echo "Present";
										}
										else 
											echo "Not Present";?></td>
										<td>
											<a class="blue waves-effect waves-light btn" href="<?php echo base_url('/student/upload/delete_file/4');?>">Delete</a></td>
											<td><?php echo form_open_multipart('student/upload/do_upload/scst');?><input type="file" name="userfile" size="20" /><input type="submit" value="upload scst" /></form></td>
										</tr>
										<tr>
											<td>5</td>
											<td>PWD</td>
											<td><?php 
											if (file_exists('./assets/uploads/documents/'.$specialization_id.'/'.$encrypt.'/pwd.pdf')) 
											{
												echo "Present";
											}
											else 
												echo "Not Present";?></td>
											<td>
												<a class="blue waves-effect waves-light btn" href="<?php echo base_url('/student/upload/delete_file/5');?>">Delete</a></td>
												<td><?php echo form_open_multipart('student/upload/do_upload/pwd');?><input type="file" name="userfile" size="20" /><input type="submit" value="upload pwd" /></form></td>
											</tr>
											<tr>
												<td>6</td>
												<td>Graduation Degree</td>
												<td><?php 
												if (file_exists('./assets/uploads/documents/'.$specialization_id.'/'.$encrypt.'/grad.pdf')) 
												{
													echo "Present";
												}
												else 
													echo "Not Present";?></td>
												<td>
													<a class="blue waves-effect waves-light btn" href="<?php echo base_url('/student/upload/delete_file/6');?>">Delete</a></td>
													<td><?php echo form_open_multipart('student/upload/do_upload/grad');?><input type="file" name="userfile" size="20" /><input type="submit" value="upload grad" /></form></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

						</body>
						</html>