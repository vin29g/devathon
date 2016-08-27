<title> Application Status | TAPS NITW</title>
<div class="container">
<h3>Application Status</h3>
<hr>
  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
    <thead>
        <tr>
          <th data-field="company">Company</th>
          <th data-field="design">Designation</th>
          <th data-field="salary">Salary</th>
          <th data-field="round">Round</th>
          <th data-field="round">Job-Type</th>
          <th data-field="round">Job-Category</th>
          <th data-field="status">Status</th>
          <th data-field="detail">Round Details</th>
       </tr>
    </thead>
    <tbody>
    <?php for ($i=0; $i <$rowcount ; $i++) { ?>
    <tr>
      <td><?php echo $result[$i]['name'] ?></td>
      <td><?php echo $result[$i]['designation'] ?></td>
      <td><?php echo $result[$i]['salary'] ?></td>
      <td><?php echo $result[$i]['round_no'] ?></td>
      <td><?php  if($result[$i]['job_type']==1) echo "Core"; else echo "Non-Core"; ?></td>
      <td><?php switch ($result[$i]['job_category']) {
        case '1':
          echo "Normal";
          break;
        case '2':
          echo "Dream";
        break;
        case '3':
          echo "SuperDream";
          break;
      }  ?></td>
      <td><?php switch ($result[$i]['status']) {
        case '0':
          echo "Pending";
          break;
        case '1':
          echo "Pending";
          break;
        case '2':
          echo "Accpeted";
          break;
      }?></td>
    <td><button class="waves-effect waves-light btn modal-trigger" href="#detail" onclick="rounddetail(<?php echo $result[$i]['id'] ?>)">Click Me for Info</button></td>
    </tr>
    <?php } ?>
  </tbody> 
  </table>
</div>
  <!-- Round Detail Structure -->
  <div id="detail" class="modal">
    <div class="modal-content">
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>

  <script type="text/javascript">
  function rounddetail(z)
  {
    $.ajax({
      url:'<?php echo base_url("/student/round_detail") ?>',
      cache:false,
      data:
      {
        id:z
      },
      type:'POST',
      success:function(data)
      {
        $('.modal-content').html(data);
      }
    });
  }
  </script>