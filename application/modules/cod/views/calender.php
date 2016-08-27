<title> Calender | TAPS NITW</title>

<body>
  
  
   
    <div class="wrapper">
      <div class="container">
        <div class="section">
          <div id="full-calendar">              
            <div class="row">
              <div class="col s12 m4 l3">
                <div id='external-events'>    
                  </div>
                </div>
               <div class="col s12 m8 l9">
                  <div id='calendar'></div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
  
 
     



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/jquery-1.11.2.min.js') ?>"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/materialize.js') ?>"></script>
    <!--prism-->
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/prism.js') ?>"></script>
    <!--scrollbar-->
    
    <!-- chartist --> 

    <!-- Calendar Script -->
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/fullcalendar/lib/jquery-ui.custom.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/fullcalendar/lib/moment.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/fullcalendar/js/fullcalendar.min.js') ?>"></script>
    <!--<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/fullcalendar/fullcalendar-script.js') ?>"></script>-->

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->

    
</body>
<script>


  $(document).ready(function() {


    
     
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      //defaultDate: '2015-05-12',
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      eventLimit: true, // allow "more" link when too many events
      events:{
          
          url:'<?php echo base_url("cod/return_events");?>',
          datatype:"json",
          type: 'POST',
                error: function() {
                    // Alert on error
                },
                success: function (data) {
                    //alert(data);
                    // data will have your json array of event objects
                },
              }
          
        
       
    });
    
  });
</script>

</html>