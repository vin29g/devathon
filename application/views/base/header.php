<!DOCTYPE html>
<html>
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
</head>

<body>
	<header></header>
	<div id="main">
		<ul id="Home" class="dropdown-content">
			<li><a href="#!">Placement</a></li>
			<li><a href="#!">NIT&nbsp;Warangal</a></li>
		</ul>
		<ul id="Recruiters" class="dropdown-content">
			<li><a href="#!">Hiring @NITW</a></li>
			<li><a href="#!">Facilities</a></li>
			<li><a href="#!">Previous Recruiters</a></li>
			<li><a href="#!">FAQ</a></li>
		</ul>
		<ul id="Students" class="dropdown-content">
			<li><a href="#!">Guidelines</a></li>
			<li><a href="#!">Placement Rules</a></li>
		</ul>
		<ul id="team" class="dropdown-content">
			<li><a href="#!">Administration</a></li>
			<li><a href="#!">The WebTeam</a></li>
			<li><a href="#!">Coordinators</a></li>
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
			<li><a href="#!">Placement</a></li>
			<li><a href="#!">NIT Warangal</a></li>
		</ul>
		<ul id="Recruiters1" class="dropdown-content">
			<li><a href="#!">Hiring @NITW</a></li>
			<li><a href="#!">Facilities</a></li>
			<li><a href="#!">Previous Recruiters</a></li>
			<li><a href="#!">FAQ</a></li>
		</ul>
		<ul id="Students1" class="dropdown-content">
			<li><a href="#!">Guidelines</a></li>
			<li><a href="#!">Placement Rules</a></li>
		</ul>
		<ul id="team1" class="dropdown-content">
			<li><a href="#!">Administration</a></li>
			<li><a href="#!">The WebTeam</a></li>
			<li><a href="#!">Coordinators</a></li>
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
					<li><a href="badges.html">Academic</a></li>
					<li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Recruiters">Recruiters<i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button"  data-beloworigin="true" href="#!" data-activates="Students">Students<i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="team">The Team<i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Login</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Home1">Home<i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a href="badges.html">Academic</a></li>
					<li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="Recruiters1">Recruiters<i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button"  data-beloworigin="true" href="#!" data-activates="Students1">Students<i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="team1">The Team<i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Login</a></li>
				</ul>
			</div>
		</nav>
	</body>
	</html>