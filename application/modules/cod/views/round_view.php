<title> Round View | TAPS NITW</title>
<style >
  @media print {
  header,footer,aside,button,input {
    display: none;
  }

  #wrap {
    left: 0;
  }
}
</style>
<h5>Round <?php echo $result[0]['round_no']; ?></h5>
  <div class="row">
              <div class="col s12">
              <div style="display: block;">
              <form action="round_eligible" method="post">
                <input name="company" value="<?php echo $comp;?>" hidden>
              <div id="">
                <table id="data-table-simple" class="responsive-table display" cellspacing="0" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                        <th data-field="id" id="eli">Eligibility</th>
                        <th data-field="name">Name</th>
                        <th data-field="branch">Branch</th>
                        <th data-field="reg">RegNo</th>
                        <th data-field="cgoa">CGPA</th>
                        <th data-field="company">Session</th>
                        <th data-field="cgcutoff">Cutoff</th>
                        <th data-field="yr">Year</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php for ($i=0; $i <$rowcount ; $i++) { if($result[$i]['round']<$result[$i]['round_no']){?>
                    <tr>
                      <td><input type="checkbox" name="<?php echo $result[$i]['userid']; ?>" id="<?php echo $result[$i]['userid']; ?>" value="eligible"/>
                          <label for="<?php echo $result[$i]['userid']; ?>"></label>
                      </td>
                      <td><?php echo $result[$i]['first_name'].' '.$result[$i]['last_name']  ?></td>
                      <td><?php echo $result[$i]['dept_name'] ?></td>
                      <td><?php echo $result[$i]['registration_number'] ?></td>
                      <td><?php echo $result[$i]['cgpa'] ?></td>
                      <td><?php echo $result[$i]['session_name'] ?></td>
                      <td><?php echo $result[$i]['cutoff'] ?></td>
                      <td><?php echo $result[$i]['cname'] ?></td>
                    </tr>
                   <?php }} ?>
                  </tbody> 
                </table>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action" center>PROCEED</button>
              </form>
      </div>
    </div>
  </div>   
    <div>
      <blockquote>Note:</blockquote>
      <ul>
        <b>
          <ol>This dataTable gives data of Students which need to be moved to next Round.</ol>
          <ol>By default for Round 1,No data will be shown as initially students are in Round 1 and no need to be elevated.</ol>
          <ol>To see data of Current Round and previous Rounds created so far for <b><i><?php echo $result[0]['company_name'] ?></i></b>,click on <u>PROCEED</u>.</ol>
          <ol>Only on modifying Rounds to next level,data of students will be available.</ol>
          <ol>Accept only those students who are cleared by Company.</ol>
        </b>
      </ul>
    </div>
<script type="text/javascript">
  $(document).ready(function()
  {
    $('#data-table-simple').DataTable();
  });
</script>
