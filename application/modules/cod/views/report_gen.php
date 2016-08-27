<title> Report | TAPS NITW</title>
<style >
  @media print {
  header,footer,aside,button {
    display: none;
  }
  #wrap {
    left: 0;
  }
}
</style>
  <div class="container">
  <div class="row">
    <div class="col s12 center" style="padding-top:20px">
      <h4>Report</h4>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col s2 offset-s8">
      <button class="btn waves-effect waves-light" id="btnPrint">Print</button>
    </div>
    <div class="col s2">
      <button class="btn waves-effect waves-light" id="download_button">Excel</button>
    </div>
  </div>
  <div id="wrap" class="container">
    <table id="data-table-simple" class="responsive-table display table2excel" cellspacing="0">
      <thead>
      <tr>
        <?php foreach ($label as $key => $value) { ?>
        <th data-field='$key'>
        <?php if($value=='category_id')
        $value='category';
        echo strtoupper($value); ?>
        </th>
        <?php } ?>
      </tr>
      </thead>
      <tbody>
        <?php for ($i=0;$i<$rowcount;$i++) { ?>
        <tr>
        <?php foreach ($result[$i] as $key => $value) {
        if($key=='category_id'||$key=='gender')
        {
        if($key=='category_id')
        {
        switch ($value) {
        case 0:
        $value='SC';
        break;
        case 1:
        $value='ST';
        case 2:
        $value='OBC';
        break;
        default:
        $value='Open';
        }
        }
        else
        {
        switch ($value) {
        case 0:
        $value='Female';
        break;
        case 1:
        $value='Male';
        break;
        }
        }
        }?>
        <td><?php echo $value; ?></td>
        <?php } ?>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>
<script src="<?php echo base_url()?>assets/materialize/js/jquery.table2excel.js"></script>
<script type="text/javascript">
  $(document).ready(function()
  {
    $('#data-table-simple').DataTable();
            $("#btnPrint").click(function () {
                var contents = $("#wrap").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ?
                frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>Report</title>');
                frameDoc.document.write('<link href="<?php echo base_url('assets/materialize/css/materialize.css')?>"rel="stylesheet" type="text/css"/>');
                frameDoc.document.write('<link href="<?php echo base_url('assets/materialize/css/style.css')?>"rel="stylesheet" type="text/css"/>');
                frameDoc.document.write('</head><body>');
                 frameDoc.document.write('<div class="row">')
                frameDoc.document.write('<div class="col s2"><img height=100px src="<?php echo base_url("assets/images/nit-warangal.png")  ?>"/></div>')
                 frameDoc.document.write('<div class="col s10"><h5>National Institute of Technology, Warangal</h5><h6>Training and Placements</h6></div>')
                frameDoc.document.write('</div><hr>')
                frameDoc.document.write('<div class="col s6"><h4>Report</h4></div>')
                frameDoc.document.write('</div><hr>');
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });
  $('#download_button').on('click',function(e){
    $(".table2excel").table2excel({
          exclude:'noExl',
          name:'Report',
          fileext:'xls',
          exclude_img:true,
          exclude_links:true,
          exclude_input:true
    });
  });
});
</script>