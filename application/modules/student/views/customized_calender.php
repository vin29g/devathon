<title> Calender | TAPS NITW</title>
<div id="full-calendar">              
            <div class="row">
              <div class="col s12 m12 l12">
                <div id='external-events'>    
                </div>
              </div>
              <div class="col s12 m12 l12">
                  <div id='calendar'></div>
              </div>
            </div>
          </div>
     
  
 
     


 
     
     <!-- Calendar Script -->
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/fullcalendar/lib/jquery-ui.custom.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/fullcalendar/lib/moment.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/fullcalendar/js/fullcalendar.min.js') ?>"></script>

     
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
           url:'<?php echo base_url("/student/return_events")?>',
          //url:'http://localhost/taps/stud/return_events',
          datatype:"json",
          type: 'POST',
                error: function() {
                    // Alert on error
                },
                success: function (data) {
                    // data will have your json array of event objects
                },
              }
          
        
       
    });
    
  });
</script>

