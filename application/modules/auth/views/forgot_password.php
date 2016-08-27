
<!DOCTYPE html>
<html>
 <title> Login | TAPS NITW</title>
<head>
<link rel="icon" href="<?php echo base_url('assets/images/favicon-32x32.png')?>" sizes="32x32">
    <!--Import Google Icon Font-->
    <link href="<?php echo base_url('assets/google_fonts/mat_icon.css')?>" rel="stylesheet">
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

    <!-- ALL CSS AND JS-->
    <!-- Favicons-->
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/images/favicon/apple-touch-icon-152x152.png')?>">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="<?php echo base_url('assets/images/favicon/mstile-144x144.png')?>">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="<?php echo base_url('assets/materialize/css/style.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo base_url('assets/materialize/css/custom-style.css')?>" type="text/css">
    <!--CSS AND JS OVER .-->
</head>

<body>
    <header>
        
        <nav>
            <div class="blue nav-wrapper">
                <ul class="left"> 
                    <li><a href="<?php echo base_url()?>" class="brand-logo darken-1"><img style="padding-top: 8%" src="<?php echo base_url('assets/images/tapslogonitw.png')?>" alt="materialize logo"></a></li>
                </ul>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Home">Home<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="<?php echo base_url('/main/view/academics')?>">Academic</a></li>
                    <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Recruiters">Recruiters<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-button"  data-beloworigin="true" href="#!" data-activates="Students">Students<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="team">The Team<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="<?php echo base_url('/main/view/contact_us')?>">Contact Us</a></li>
                    <li><a href="<?php echo base_url('/auth/index') ?>">Login</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Home1">Home<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="<?php echo base_url('/main/view/academics')?>">Academic</a></li>
                    <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Recruiters1">Recruiters<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-button"  data-beloworigin="true" href="#!" data-activates="Students1">Students<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="team1">The Team<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="<?php echo base_url('/main/view/contact_us')?>">Contact Us</a></li>
                    <li><a href="<?php echo base_url('/auth/index') ?>">Login</a></li>
                </ul>
            </div>
        </nav>
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


    </header>

 <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" action="forgot_password" method="POST">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?php echo base_url('assets/images/nitwlogoblack.png')?>" alt="" class="responsive-img  profile-image-login">
            <p class="center login-form-text">TAPS Login Portal</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="identity" name="identity" type="email">
            <label for="identity" class="center-align">Email Address</label>
          </div>
        </div>
 
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" name="action" class="btn waves-effect waves-light col s12 ">Send Email</button>     
          </div>
        </div>
        <div class="row">
          <!-- <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="http://demo.geekslabs.com/materialize/v2.1/layout01/page-register.html">Register Now!</a></p>
          </div> -->
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="<?php echo base_url('auth/')?>">Login</a></p>
          </div>          
        </div>

      </form>
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
</body>
</html>
