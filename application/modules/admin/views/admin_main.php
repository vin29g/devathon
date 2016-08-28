<title> Admin | CMS NITW</title>
<div>
	<div class="row">
        <div class="col s12 m4">
        	<div class="card blue darken-3">
            <div class="card-content white-text flow-text">
              <span class="card-title">All Complaints</span>
              <div class="card-body"><?php echo count($comp);?></div>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue darken-3">
            <div class="card-content white-text flow-text">
              <span class="card-title"><a class="white-text" href="<?php echo base_url('admin/approved_appl');?>"><u>Approved</u></a><small>  Administrator</small></span>
              <div class="card-body" id="apa"></div>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue darken-3">
            <div class="card-content white-text flow-text">
              <span class="card-title">Approved</a><small></small></span>
              <div class="card-body" id="apc"></div>
            </div>
          </div>
        </div>
      </div>
	<hr>
	<div class="row">
<!-- 		<div class="col s10">
			<?php foreach ($comp as $result) { ?>
				<?php print_r($result);?>
			<?php }?>
		</div> -->
	</div>
	<div id="table-datatables">
			<form action="<?php echo base_url();?>admin/assign_it" method="post">
                <table id="tab" class="responsive-table display" cellspacing="0" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                        <th data-field="id" id="eli">Complain Id</th>
                        <th data-field="name">Description</th>
                        <th data-field="name">Approval status</th>
                        <th data-field="branch">Asked by</th>
                        <th data-field="reg">Status</th>
                        <th data-field="reg">Assign</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($comp as $result) {?>
                    <tr>
                      <td><?php echo $result['id']; ?></td>
                      <td><?php echo $result['description']  ?></td>
                      <td><?php switch ($result['approval']) {
                        case 1:
                          echo "Approved";
                          break;
                        case 0:
                          echo "Not Approved";
                         break;
                        case 2:
                          echo "Completed";
                          break;
                      }?></td>
                      <td><?php echo $result['complainBy']  ?></td>
                      <td><?php echo $result['status']  ?></td>
                      <td>
						<select id="assign" name="<?php echo $result['id']; ?>" class="browser-default" <?php if($result['approval']==2) echo "disabled";?>>
						<option value="none" selected>Select</option>
						<?php foreach($assignee as $ass){ ?>
						<option value="<?php echo $ass['name'];?>"><?php echo $ass['description'];?></option>
						<?php } ?>
						</select>
                      </td>
                    </tr>
                   <?php } ?>
                  </tbody> 
                </table>
    			<button class="btn waves-effect waves-light" type="submit" name="action" value="1" id="submit" center>Submit</button>
              </form>
                </div>
      </div>
    </div>
  </div>   

<script type="text/javascript">
  $(document).ready(function()
  {
    $("#tab").DataTable();
  });
</script>