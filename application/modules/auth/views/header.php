<!DOCTYPE html>
<html>
<head>
	
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
        <link href="<?php echo base_url('assets/materialize/css/materialize.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<?php echo base_url('assets/materialize/css/style.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- Custome CSS-->    
        <link href="<?php echo base_url('assets/materialize/css/custom-style.css')?>" type="text/css">
        <!--CSS AND JS OVER .-->
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
		<div class="main">
