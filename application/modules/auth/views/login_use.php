<!DOCTYPE html>
<html>
<head>
<title> Login | TAPS NITW</title>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/materialize/css/materialize.min.css')?>"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  #main {
    flex: 1 0 auto;
  }
  </style>
  <script type="text/javascript">
  $(document).ready(function()
  {
    $(".dropdown-button").dropdown({hover: false});
  });
  </script>
</head>

<body>
  <header>
    <ul id="Home" class="dropdown-content">
      <li><a href="<?php echo base_url('/main')?>">Placement</a></li>
      <li><a href="http://www.nitw.ac.in">NIT&nbsp;Warangal</a></li>
    </ul>
    <ul id="Recruiters" class="dropdown-content">
      <li><a href="<?php echo base_url('/main/view/hiring')?>">Hiring @NITW</a></li>
      <li><a href="<?php echo base_url('/main/view/facilities')?>">Facilities</a></li>
      <li><a href="<?php echo base_url('/main/view/previous_recruiters')?>">Previous Recruiters</a></li>
      <li><a href="<?php echo base_url('/main/view/faq')?>">FAQ</a></li>
    </ul>
    <ul id="Students" class="dropdown-content">
      <li><a href="<?php echo base_url('/main/view/student_guide_lines')?>">Guidelines</a></li>
      <li><a href="<?php echo base_url('/main/view/placement_rule')?>">Placement Rules</a></li>
    </ul>
    <ul id="team" class="dropdown-content">
      <li><a href="<?php echo base_url('/main/view/administration')?>">Administration</a></li>
      <li><a href="<?php echo base_url('/main/view/webteam')?>">The WebTeam</a></li>
      <li><a href="<?php echo base_url('/main/view/coordinators')?>">Coordinators</a></li>
    </ul>
    <ul id="search" class="dropdown-content">
      <li><form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form></li>
    </ul>
    <ul id="Home1" class="dropdown-content">
      <li><a href="<?php echo base_url('/main/view/placements_home')?>">Placement</a></li>
      <li><a href="http://www.nitw.ac.in">NIT&nbsp;Warangal</a></li>
    </ul>
    <ul id="Recruiters1" class="dropdown-content">
      <li><a href="<?php echo base_url('/main/view/hiring')?>">Hiring @NITW</a></li>
      <li><a href="<?php echo base_url('/main/view/facilities')?>">Facilities</a></li>
      <li><a href="<?php echo base_url('/main/view/previous_recruiters')?>">Previous Recruiters</a></li>
      <li><a href="<?php echo base_url('/main/view/faq')?>">FAQ</a></li>
    </ul>
    <ul id="Students1" class="dropdown-content">
      <li><a href="<?php echo base_url('/main/view/student_guide_lines')?>">Guidelines</a></li>
      <li><a href="<?php echo base_url('/main/view/placement_rule')?>">Placement Rules</a></li>
    </ul>
    <ul id="team1" class="dropdown-content">
      <li><a href="<?php echo base_url('/main/view/administration')?>">Administration</a></li>
      <li><a href="<?php echo base_url('/main/view/webteam')?>">The WebTeam</a></li>
      <li><a href="<?php echo base_url('/main/view/coordinators')?>">Coordinators</a></li>
    </ul>
    <ul id="search" class="dropdown-content">
      <li><form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form></li>
    </ul>


    <nav>
      <div class="blue nav-wrapper">
        <a href="#" class="brand-logo">TAPS</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Home">Home<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="<?php echo base_url('/main/view/academics')?>">Academic</a></li>
          <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Recruiters">Recruiters<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="dropdown-button"  data-beloworigin="true" href="#!" data-activates="Students">Students<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="team">The Team<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="<?php echo base_url('/main/view/contact_us')?>">Contact Us</a></li>
          <li><a href="#">Login</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Home1">Home<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="<?php echo base_url('/main/view/academics')?>">Academic</a></li>
          <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Recruiters1">Recruiters<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="dropdown-button"  data-beloworigin="true" href="#!" data-activates="Students1">Students<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="team1">The Team<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="<?php echo base_url('/main/view/contact_us')?>">Contact Us</a></li>
          <li><a href="#">Login</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <div class = "container">
   <div class="valign">
    <div class="card-panel hoverable">
      <div class ="centre-align">
        <form action ="<?php echo base_url('auth/login')?>">
          <div class="input-field ">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="identity" name ="identity" type="text" class="validate" required>
            <label for="Userid">User ID</label>
            <p>

            </p>
          </div>
          <div class="input-field ">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" name="password" type="password" class="validate" required>
            <label for="Password">Password</label>
            <p>
            </p>
          </div>
          <div class="row">
            <div class="col s12">
              <p>
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col m12">
              <p class="left-align"><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
              <p class="right-align">
                <button class="btn btn-large waves-effect waves-light" type="submit" name="action">Login</button>
              </p>

            </div>

          </form>
        </div>
      </div>


    </div>
  </div>

</div>
<!-- START FOOTER -->
<footer class="blue page-footer">

  <div class="row">
    <div class="col l2 hide-on-small-only m3">
      <img class="" width="145px" style="padding-top:10px; padding-left:30px;" src="<?php echo base_url('/assets/images/nitwlogo.png')?>">
    </div>
    <div class="col l4 s12 m6">
      <h5 class="white-text">Training and Placement Section</h5>
      <p class="grey-text text-lighten-4">National Institute of Technology<br>Warangal - 506021, Telangana, India<br>Phone : +91-870-2462930<br>Telefax : +91-870-2459325</p>
    </div>
    <div class="col l4 offset-l2 s12 m3">
      <h5 class="white-text">Links</h5>
      <ul >
       <li><a class="white-text" href="<?php echo base_url('/main/view/legal_disclaimer')?>">Legal Disclaimer</a></li>
       <li><a class="white-text" href="#!">Terms of Use</a></li>
       <li><a class="white-text" href="<?php echo base_url('/main/view/webteam')?>">Webteam</a></li>
         <li><a class="white-text" href="<?php echo base_url('/main/view/sitemap')?>">Sitemap</a></li>
       <li><a class="white-text" id="gototop" class="gototop" href="#"><span class="glyphicon glyphicon-arrow-up"></span>Top</a></li>
     </ul>
   </div>
 </div>
 <div class="footer-copyright">
  <div class="container">&copy 2015 WSDC NITW
    <a class="grey-text text-lighten-4 right" href="http://wsdc.nitw.ac.in">wsdc.nitw.ac.in</a>
  </div>
</div>
</footer> 
<!-- END FOOTER -->

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/materialize.min.js')?>"></script>
<script type="text/javascript">
$( document ).ready(function(){$(".button-collapse").sideNav();}) ;
</script>
</body>
</html>