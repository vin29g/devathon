<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-tap-highlight" content="no">

		<link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/images/favicon/apple-touch-icon-152x152.png')?>">
		<meta name="msapplication-TileColor" content="#00bcd4">
		<meta name="msapplication-TileImage" content="<?php echo base_url('assets/images/favicon/mstile-144x144.png')?>">
		<link href="<?php echo base_url('assets/materialize/css/materialize.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
		<link href="<?php echo base_url('assets/materialize/css/style.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
		<link href="<?php echo base_url('assets/materialize/css/custom-style.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
		<link href="<?php echo base_url('assets/materialize/js/plugins/perfect-scrollbar/perfect-scrollbar.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
		<link href="<?php echo base_url('assets/materialize/js/plugins/jvectormap/jquery-jvectormap.css')?>" type="text/css?>" rel="stylesheet" media="screen,projection">
		<link href="<?php echo base_url('assets/materialize/js/plugins/chartist-js/chartist.min.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
		<link href="<?php echo base_url('assets/materialize/js/plugins/chartist-js/chartist.min.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
		<link href="<?php echo base_url('assets/materialize/js/plugins/fullcalendar/css/fullcalendar.min.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/jquery-1.11.2.js')?>"></script>  
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/data-tables/js/jquery.dataTables.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/data-tables/data-tables-script.js')?>"></script>
		<link href="<?php echo base_url('assets/materialize/js/plugins/data-tables/css/jquery.dataTables.min.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
		<link href="<?php echo base_url('assets/jquery-ui/jquery-ui.css')?>" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<ul id="option" class="dropdown-content ">
			<li class="blue-text"><a href="<?php echo base_url('student/profile')?>">Profile</a>
			</li>
			<li><a href="layout01.html#">Settings</a>
			</li>
			<li><a href="layout01.html#">Help</a>
			</li>
			<?php if($this->ion_auth->in_group('admin')||$this->ion_auth->in_group('cod')){ ?>
				<li><a href="<?php echo base_url('/student')?>">Stud</a>
				</li>
				<li><a href="<?php echo base_url('/cod')?>">COD</a>
				</li>
				<?php if($this->ion_auth->in_group('admin')){ ?>
					<li><a href="<?php echo base_url('/admin')?>">Admin</a>
					</li>
				<?php } ?>
			<?php } ?>
			<li class="divider">
			</li>
			<li><a href="<?php echo base_url('auth/logout')?>">Logout</a>
			</li>
			<li class="divider">
			</li>
			<li><a href="<?php echo base_url('student/deactivate_req')?>">Deactivate account</a>
			</li>
		</ul>

		<header id="header" class="page-topbar">
			<div class="navbar-fixed">
				<nav class="cyan">
					<div class="nav-wrapper">
						<ul class="left">
							<li><h1 class="logo-wrapper"><a href="<?php echo base_url('/student');?>" class="brand-logo darken-1">TAPS</a></h1></li>
						</ul>
						<div class="header-search-wrapper hide-on-med-and-down">
							<i class="mdi-action-search"></i>
							<input type="text" name="Search" id="company" class="header-search-input z-depth-2" placeholder="Search Company"/>
						</div>
						<ul class="right hide-on-med-and-down">                        
							<li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
							</li>
							<li><a class="dropdown-button waves-effect waves-block waves-light" href="#!" data-activates="option"><i class="mdi-action-settings"></i></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>

		<div id="main">
			<div class="wrapper">
				<aside id="left-sidebar-nav">
					<ul id="slide-out" class="side-nav fixed leftside-navigation">
						<li class="user-details cyan darken-2">
							<div class="row">
								<div class="col col s4 m4 l4">
									<a href="<?php echo base_url('student/upload/upload_photo')?>" style="display:inline;">
										<img src="<?php if (file_exists('./assets/stud_uploads/'.$id.'.jpg')){echo base_url('assets/stud_uploads/'.$id.'.jpg');} else {echo base_url('assets/materialize/images/avatar.jpg');}?>" alt="" class="circle responsive-img valign profile-image">
									</a>
								</div>
								<div class="col col s8 m8 l8">
									<ul id="profile-dropdown" class="dropdown-content">
										<li><a href="<?php echo base_url('student/profile_temp')?>"><i class="mdi-action-face-unlock"></i>Profile</a>
										</li>
										<li><a href="#"><i class="mdi-action-settings"></i>Settings</a>
										</li>
										<li><a href="<?php echo base_url('/student/stud_help_temp')?>"><i class="mdi-communication-live-help"></i>Help</a>
										</li>
										<?php if($this->ion_auth->in_group('admin')||$this->ion_auth->in_group('cod')){ ?>
										<li><a href="<?php echo base_url('/student')?>"><i class="mdi-social-school"></i>Stud</a>
										</li>
										<li><a href="<?php echo base_url('/cod')?>"><i class="mdi-social-people"></i>COD</a>
										</li>
										<?php if($this->ion_auth->in_group('admin')){ ?>
										<li><a href="<?php echo base_url('/admin')?>"><i class="mdi-hardware-security"></i>Admin</a>
										</li>
										<?php } ?>
										<?php } ?>
										<li class="divider">
										</li>
										<li><a href="<?php echo base_url('auth/logout')?>"><i class="mdi-hardware-keyboard-tab"></i>Logout</a>
										</li>
									</ul>
									<a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="layout01.html#" data-activates="profile-dropdown"><?php echo $first_name?><i class="mdi-navigation-arrow-drop-down right"></i></a>
									<p class="user-roal"><?php echo $roll_number ?> </p>
								</div>
							</div>
						</li>
						 
						 
						 
						 
						<li class="bold "><a href="<?php echo base_url('/student')?>" class="waves-effect waves-cyan"><i class="mdi-alert-error"></i> Rules and Regulations</a>
						</li>
					</ul>
					<a href="layout01.html#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
				</aside>
				<section>
					<div class="container">