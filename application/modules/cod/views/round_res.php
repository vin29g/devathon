<title> Round Result | TAPS NITW</title>
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
<div class="container">
<div style="padding:1em;">
<h2><?php echo $result[0]['company_name'] ?> Rounds</h2>
<blockquote>This page may contain previously accepted applicants by you</blockquote>
</div>
<hr>
<div class="row">
<div class="col s12">
<ul class="tabs tab-demo z-depth-1" style="width: 100%;">
<?php for ($i=1; $i <=$result[0]['round_no'] ; $i++) {?>
<li class="tab col s3"><a <?php if($i==$result[0]['round_no']) echo "class='active'";else echo 'class=""'?> href="#round<?php echo $i?>"><?php if($i==$result[0]['round_no']) echo '*'; ?>Round <?php echo $i ;?></a>
</li>
<?php }?>
</ul>
</div>
<div class="col s12">
  <?php for ($j=1; $j <=$result[0]['round_no']; $j++) {?>
  <div id="round<?php echo $j?>" class="col s12" <?php if($j==$result[0]['round_no']) echo 'style="display: block; padding:1em"';else echo 'style="display: none; padding:1em"';?> >
    <div class="row">
      <button class="btn waves-effect waves-light col s1 offset-s7" id="<?php echo $j?>" onclick="Print(this)">Print</button>
      <button class="btn waves-effect waves-light col s1 offset-s1" id="export<?php echo $j ?>">CSV</button>
      <button class="btn waves-effect waves-light col s1 offset-s1" id="btnSMS" onclick="get_sms()">SMS</button>
    </div>
    <table id="data-table-simple<?php echo $j?>" class="responsive-table display" cellspacing="0">
    <thead>
    <tr>
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
    <?php for ($i=0; $i <$rowcount ; $i++) { if($result[$i]['round']>=$j){?>
    <tr>
    <td><?php echo $result[$i]['first_name'].' '.$result[$i]['last_name']  ?></td>
    <td><?php echo $result[$i]['dept_name'] ?></td>
    <td><?php echo $result[$i]['registration_number'] ?></td>
    <td><?php echo $result[$i]['cgpa'] ?></td>
    <td><?php echo $result[$i]['session_name'] ?></td>
    <td><?php echo $result[$i]['cutoff'] ?></td>
    <td><?php echo $result[$i]['cname'] ?></td>
    </tr>
    <?php }}?>
    </tbody> 
    </table>
  </div>
  <?php }?>
</div>
</div>
<script type="text/javascript">
jQuery.fn.tableToCSV = function(t) {
    var clean_text = function(text){
        text = text.replace(/"/g, '""');
        return '"'+text+'"';
    };
    
  $(this).each(function(){
      var table = $(this);
      var caption = $(this).find('caption').text();
      var title = [];
      var rows = [];

      $(this).find('tr').each(function(){
        var data = [];
        $(this).find('th').each(function(){
                    var text = clean_text($(this).text());
          title.push(text);
          });
        $(this).find('td').each(function(){
                    var text = clean_text($(this).text());
          data.push(text);
          });
        data = data.join(",");
        rows.push(data);
        });
      title = title.join(",");
      rows = rows.join("\n");

      var csv = title + rows;
      var uri = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
      var download_link = document.createElement('a');
      var caption="<?php echo $result[0]['company_name'] ?>";
      download_link.href = uri;
      if(caption==""){
        download_link.download = "Round"+t+".csv";
      } else {
        download_link.download = caption+"-"+"Round"+t+".csv";
      }
      document.body.appendChild(download_link);
      download_link.click();
      document.body.removeChild(download_link);
  });
    
};
function Print(y)
{
  var z=y.id;
  var content="#data-table-simple"+z;
  var contents = $(content).html();
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
  frameDoc.document.write('<div class="container"><div class="row">')
  frameDoc.document.write('<div class="col s2"><img height=100px src="<?php echo base_url("assets/images/nit-warangal.png")  ?>"/></div>')
   frameDoc.document.write('<div class="col s10"><h5>National Institute of Technology, Warangal</h5><h6>Training and Placements</h6></div>')
  frameDoc.document.write('</div><hr>')
  frameDoc.document.write('<div class="col s12"><h5>Round Selected</h5><hr></div>');
  frameDoc.document.write('<table>');
  frameDoc.document.write(contents);
  frameDoc.document.write('</table><div></body></html>');
  frameDoc.document.close();
  setTimeout(function () {
      window.frames["frame1"].focus();
      window.frames["frame1"].print();
      frame1.remove();
  }, 500);
}
        $(function () {
            $("#btnPrint").click(function () {
                var contents = $("#data-table-simple").html();
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
                frameDoc.document.write('<div class="container"><div class="row">')
                frameDoc.document.write('<div class="col s2"><img height=100px src="<?php echo base_url("assets/images/nit-warangal.png")  ?>"/></div>')
                 frameDoc.document.write('<div class="col s10"><h5>National Institute of Technology, Warangal</h5><h6>Training and Placements</h6></div>')
                frameDoc.document.write('</div><hr>')
                frameDoc.document.write('<div class="col s12"><h5>Round Selected</h5><hr></div>');
                frameDoc.document.write('<table>');
                frameDoc.document.write(contents);
                frameDoc.document.write('</table><div></body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });
        });
function get_sms()
{
  var total = 3;
    var data_sms = new Array();
        $("#data-table-simple<?php echo $result[0]['round_no']?> tr").each(function(row, tr){
        data_sms={"RegNo" : $(tr).find('td:eq(2)').text()}    
    }); 
    $.ajax({ 
        type: "POST",
        url: "<?php echo base_url('cod/send_msg')?>",
        data: {collection : data_sms},
        cache: false,
        success: function(response)
        {
            console.log(response);
            alert('success');
        }
    });
}
</script>
<script type="text/javascript">
  $(document).ready(function()
  {
    <?php for ($i=1; $i <=$result[0]['round_no']; $i++) {?>
    $("#data-table-simple<?php echo $i ?>").DataTable();
    $('ul.tabs tab-demo z-depth-1').tabs('select_tab', 'round<?php echo $i?>');
    <?php }?>
});
 $(function(){
  <?php for ($i=1; $i <=$result[0]['round_no']; $i++) {?>
            $("#export<?php echo $i ?>").click(function(){
                $("#data-table-simple<?php echo $i ?>").tableToCSV(<?php echo $i ?>);
            });
  <?php }?>
        });
</script>