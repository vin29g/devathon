<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">

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
    <!-- Jquery UI -->
    <link href="<?php echo base_url('assets/jquery-ui/jquery-ui.css')?>" rel="stylesheet" type="text/css" />
    <link rel="icon" href="<?php echo base_url('assets/images/favicon-32x32.png')?>" sizes="32x32">
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
    <link href="<?php echo base_url('assets/materialize/js/plugins/data-tables/css/jquery.dataTables.min.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
    
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/jquery-1.11.2.min.js')?>"></script>  
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/materialize.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/data-tables/js/jquery.dataTables.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/data-tables/data-tables-script.js')?>"></script>
</head>


<body>
    <ul id="option" class="dropdown-content ">
        <li class="blue-text"><a href="<?php echo base_url('student/profile')?>"> Profile</a>
        </li>
        <li><a href="layout01.html#">Settings</a>
        </li>
        <li><a href="layout01.html#"> Help</a>
        </li>
        <?php if($this->ion_auth->in_group('admin')||$this->ion_auth->in_group('cod')){ ?>
        <li><a href="<?php echo base_url('/student')?>">Stud</a>
        </li>
        <li><a href="<?php echo base_url('/cod')?>">COD</a>
        </li>
        <?php if($this->ion_auth->in_group('admin')){ ?>
        <li><a href="<?php echo base_url('/admin')?>"> Admin</a>
        </li>
        <?php } ?>
        <?php } ?>

        <li class="divider"></li>

        <li><a href="<?php echo base_url('auth/logout')?>"> Logout</a>
        </li>
    </ul>
    <header id="header" class="page-topbar">
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">
                    <ul class="left">                      
                        <li><h1 class="logo-wrapper"><a href="<?php echo base_url('admin');?>" class="brand-logo darken-1">TAPS</a></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" id="student" class="header-search-input z-depth-2" placeholder="Explore TAPS--feature coming soon"/>
                    </div>
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
                                <a href="<?php echo base_url('student/upload/upload_photo')?>" style="display:inline;"> <img src="<?php if (file_exists('./assets/stud_uploads/'.$id.'.jpg')){echo base_url('assets/stud_uploads/'.$id.'.jpg');} else {echo base_url('assets/materialize/images/avatar.jpg');}?>" alt="" class="circle responsive-img valign profile-image"></a>
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="<?php echo base_url('student/profile')?>"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="<?php echo base_url('/admin/admin_help')?>"><i class="mdi-communication-live-help"></i> Help</a>
                                    </li>
                                    <?php if($this->ion_auth->in_group('admin')||$this->ion_auth->in_group('cod')){ ?>
                                    <li><a href="<?php echo base_url('/student')?>"><i class="mdi-social-school"></i>Stud</a>
                                    </li>
                                    <li><a href="<?php echo base_url('/cod')?>"><i class="mdi-social-people"></i>COD</a>
                                    </li>
                                    <?php if($this->ion_auth->in_group('admin')){ ?>
                                    <li><a href="<?php echo base_url('/admin')?>"><i class="mdi-hardware-security"></i> Admin</a>
                                    </li>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                    <li class="divider"></li>
                                    
                                    <li><a href="<?php echo base_url('auth/logout')?>"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="layout01.html#" data-activates="profile-dropdown"><?php echo $user->first_name; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Administrator</p>
                            </div>
                        </div>
                    </li>
                    
                    <li class="bold active"><a href="<?php echo base_url('/admin')?>" class="waves-effect waves-cyan"><i class="mdi-action-home"></i>Home</a>
                    </li>
<!--                     <li class="bold">
                        <a href="<?php echo base_url('admin/unapproved_companies')?>" class="waves-effect waves-cyan"><i class="mdi-communication-business"></i>Approve Company
                            <?php if($unapproved_number!==0){ ?>
                            <span class="new badge" id="unapproved_badge"><?php echo $unapproved_number; ?></span>
                            <?php } ?>
                        </a>
                    </li> -->
<!--                     <li class="bold"><a href="<?php echo base_url('/admin/show_calender') ?>" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Calender</a>
                    </li>
                    <li class="bold"><a href="<?php echo base_url('/admin/all_coordinators') ?>" class="waves-effect waves-cyan"><i class="mdi-action-assignment-ind"></i> Co-ordinators</a>
                    </li>
                    <li class="bold"><a href="<?php echo base_url('/admin/profilelock') ?>" class="waves-effect waves-cyan"><i class="mdi-action-lock-open"></i> User Profile-Lock</a>
                    </li>
                    <li class="bold"><a href="<?php echo base_url('/admin/deactivate_req') ?>" class="waves-effect waves-cyan"><i class="mdi-action-lock-open"></i>Deactivation Requests</a>
                    </li>
                    <li class="bold"><a href="<?php echo base_url('/admin/feedbacks') ?>" class="waves-effect waves-cyan"><i class="mdi-action-lock-open"></i>Feedbacks</a>
                    </li> -->
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold">
                                <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-child"></i> Users management</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url('admin/create_user')?>" class="waves-effect waves-cyan">
                                            <i class="mdi-social-person-add"></i>Create User</a>
                                        </li>
                                        <li><a href="<?php echo base_url('auth/manageuser')?>" class="waves-effect waves-cyan">
                                            <i class="mdi-action-settings"></i>Edit User</a>
                                        </li>
                                        <li><a href="<?php echo base_url('/admin/upload_stud_list_view')?>" class="waves-effect waves-cyan">
                                            <i class="mdi-file-file-upload"></i>Upload Student List</a>
                                        </li>
                                         <li><a href="<?php echo base_url('/admin/send_activation')?>" class="waves-effect waves-cyan">
                                            <i class="mdi-communication-email"></i>Send Activation</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold">
                                <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-spellcheck"></i>GPA verification
                                </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url('admin/get_gpa_table')?>/0">Pending</a>
                                        </li>
                                        <li><a href="<?php echo base_url('admin/get_gpa_table')?>/-1">Dismissed</a>
                                        </li>
                                        <li><a href="<?php echo base_url('admin/get_gpa_table')?>/1">Approved</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="bold">
                        <a href="<?php echo base_url('/cod/sms')?>" class="waves-effect waves-cyan">
                            <i class="mdi-content-markunread"></i>SMS
                        </a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-file-cloud-download"></i>Downloads</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url('admin/sql_download')?>">Download sql file</a>
                                        </li>
                                        <li><a href="<?php echo base_url('admin/assets_download')?>">Download assets folder</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <section>
                <div class="container">
