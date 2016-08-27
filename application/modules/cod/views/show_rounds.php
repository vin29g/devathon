<title> Round View | TAPS NITW</title>
<h3>Modify Rounds</h3>
<hr>
  <div class="row">
              <div class="col s12">
              <div style="display: block;">
              <form method="post" action="<?php echo base_url('cod/round_edit')?>">
              <div id="table-datatables">
                <table id="tab" class="responsive-table display" cellspacing="0" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                        <th data-field="id" id="eli">Visit Id</th>
                        <th data-field="name">Company</th>
                        <th data-field="name">Requirement</th>
                        <th data-field="branch">Current Round</th>
                        <th data-field="reg">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php for ($i=0; $i <$rowcount ; $i++) { ?>
                    <tr>
                      <td><?php echo $result[$i]['visit_id']; ?></td>
                      <td><?php echo $result[$i]['name']  ?></td>
                      <td><?php switch ($result[$i]['session_id']) {
                        case 1:
                          echo "Summer Intern";
                          break;
                        case 2:
                          echo "Winter Intern";
                          break;
                        case 3:
                          echo "Placement";
                          break;  
                        default:
                          echo "Nothing";
                          break;
                      }?></td>
                      <td id="apa<?php echo $result[$i]['visit_id']; ?>"><?php echo $result[$i]['round_no'] ?></td>
                      <td>
                        <div class="status<?php echo $result[$i]['visit_id'] ?>" >
                        <button class="btn waves-effect waves-light teal lighten-2 col" id="<?php echo  $result[$i]['id'] ?>" type="submit" name="action" value="<?php echo  $result[$i]['visit_id'] ?>">Round Edit</button>
<!--                          <button class="btn waves-effect waves-light col s4"  id="<?php echo  $result[$i]['id'] ?>" onclick="dismiss(<?php echo  $result[$i]['visit_id'] ?>)" name="action">Delete</button> -->
                      </div>
                    </td>
                    </tr>
                   <?php } ?>
                  </tbody> 
                </table>
                </div>
              </form>
      </div>
    </div>
  </div>   

<script type="text/javascript">
  $(document).ready(function()
  {
    $("#tab").DataTable();
  });
</script>

