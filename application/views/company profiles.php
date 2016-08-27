<div class="container">
<!DOCTYPE html>
<html>
<head>
   <title>Company Profiles | TAPS NITW</title>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>

      <!--
      This is Internal Page for Company Profiles. Hence done in Materialize.
    -->
    <div class="wrapper">
      <div class="row">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Company Profiles</span>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col s12 m6 l3">
          <div class="z-depth-2">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <img src="images\Company Logo.png" class="card-profile-image col m3 s3 l3 responsive-img">
                  <span class="card-title col m9 s9 l9 center">Company Name</span>
                </div>
                <div class="row">
                  <div class="col s3 m3 l3">About</div>
                  <div class="col s1 m1 l1">:</div>
                  <div class="col s8 m8 l8">This is a Company Specializing in Software Industry</div>
                </div>
                <div class="row">
                  <div class="col s3 m3 l3">CGPA Cutoff</div>
                  <div class="col s1 m1 l1">:</div>
                  <div class="col s8 m8 l8">10.00</div>
                </div>
                <div class="row">
                  <div class="col s3 m3 l3">Salary Offer</div>
                  <div class="col s1 m1 l1">:</div>
                  <div class="col s8 m8 l8">10.00 lac</div>
                </div>
                <div class="row">
                  <div class="col s3 m3 l3">Job Profile</div>
                  <div class="col s1 m1 l1">:</div>
                  <div class="col s8 m8 l8">Web Developer</div>
                </div>
                <p class="right-align">
                 <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Read More</a>

                 <!-- Modal Structure -->
                 

                 
                 <div id="modal1" class="modal modal-fixed-footer">
                  <div class="modal-content">
                    <h4>Modal Header</h4>
                    <p>A bunch of text</p>
                  </div>
                  <div class="modal-footer">
                    <a class="waves-effect waves-light btn modal-trigger" >Apply</a>
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                  </div>
                </div>
                <p>
                </div>
              </div>

            </div>
          </div>
          <script type="text/javascript">
          $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
          </script>
        </body>
        </html>