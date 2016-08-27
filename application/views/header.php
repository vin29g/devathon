<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="<?php echo base_url('assets/google_fonts/mat_icon.css')?>" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/materialize/css/materialize.min.css')?>"  media="screen,projection"/>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/favicon/apple-icon-57x57.png')?>">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/favicon/apple-icon-60x60.png')?>">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/favicon/apple-icon-72x72.png')?>">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/favicon/apple-icon-76x76.png')?>">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/favicon/apple-icon-114x114.png')?>">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/favicon/apple-icon-120x120.png')?>">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/favicon/apple-icon-144x144.png')?>">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/favicon/apple-icon-152x152.png')?>">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/favicon/apple-icon-180x180.png')?>">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('assets/favicon/android-icon-192x192.png')?>">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/favicon/favicon-32x32.png')?>">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/favicon/favicon-96x96.png')?>">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/favicon/favicon-16x16.png')?>">
		<link rel="manifest" href="<?php echo base_url('assets/favicon/favicon-32x32.png')?>/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo base_url('assets/favicon/ms-icon-144x144.png')?>">
		<meta name="theme-color" content="#ffffff">

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style>
			body
			{
				display: flex;
				min-height: 100vh;
				flex-direction: column;
			}
			#main
			{
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
						<li><a href="<?php echo base_url('/main/contact_us')?>">Contact Us</a></li>
						<!-- <li><a href="<?php echo base_url('/auth/index') ?>">Login</a></li> -->
					</ul>
					<ul class="side-nav" id="mobile-demo">
						<li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Home1">Home<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a href="<?php echo base_url('/main/view/academics')?>">Academic</a></li>
						<li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Recruiters1">Recruiters<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a class="dropdown-button"  data-beloworigin="true" href="#!" data-activates="Students1">Students<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="team1">The Team<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a href="<?php echo base_url('/main/contact_us')?>">Contact Us</a></li>
						<!-- <li><a href="<?php echo base_url('/auth/index') ?>">Login</a></li> -->
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
				<li>
					<form>
						<div class="input-field">
							<input id="search" type="search" required>
							<label for="search"><i class="material-icons">search</i></label>
							<i class="material-icons">close</i>
						</div>
					</form>
				</li>
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
		</header>

		<div id="main">
			<div class="wrapper">
				<section>
					<!-- <div class="container"> -->
