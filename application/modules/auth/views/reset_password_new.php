<title> Reset Password | TAPS NITW</title>
<h1><?php echo lang('reset_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>



	<p>
		<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
	</p>

	<p>
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<p><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></p>



<!DOCTYPE html>
<html>
 <title> Login | TAPS NITW</title>
<head>

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
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
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
<?php $url= base_url('auth/reset_password').'/'.$code?>
<body class="cyan">
  
 



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" action="<?php echo $url?>" method="post">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Reset Password</h4>
            <p class="center">You can reset your password</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="new" name="new" type="password">
            <label for="new" class="center-align">Password</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="new_confirm" name="new_confirm" type="password">
            <label for="new_confirm">Confirm Password</label>
          </div>
        </div>
        <?php echo form_input($user_id);?>
        <?php echo form_hidden($csrf); ?>
        <div class="row">
          <div class="input-field col s12">
             <button type="submit" name="action" class="btn waves-effect waves-light col s12 ">Reset Password</button> 
          </div>
        </div>
      
    </div>
  </div>


  <!-- ================================================
    Scripts
    ================================================ -->

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
