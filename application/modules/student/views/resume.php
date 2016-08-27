<!DOCTYPE>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title><?php echo $name?>'s Resume | TAPS NITW</title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url(images/noise.jpg); }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0;height: auto; 
    width: auto; 
    max-width: 60px; 
    max-height: 60px; }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px;width: 600px; }
     </style>
</head>

<body>

    <div id="page-wrap">
    
        <img src="<?php echo base_url('assets/stud_uploads')."/".$roll_number.".jpg"?>"  id="pic" />
    
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
        
            <h1 class="fn"><?php echo $name?></h1>
        
            <p> 
                Cell: <span class="tel"><?php echo $mobile?></span><br />
                Email: <a class="email" href="mailto:<?php echo "email" ?>"><?php echo $email?></a></br>
                Gender: <?php if($gender==0) {print_r("Female");} else print_r("Male");?></br>
                Date of Birth(yyyy/mm/dd):<?php echo $birthday?></br>
                Permanent Address:<?php echo $permanent_address?></br>

            </p>
        </div>
                
        
        
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt>Education</dt>
            <dd>
                <h2>National Institute of Technology Warangal</h2>
                <p><strong>Major:</strong> <?php echo  $specialization?><br />
                   
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Skills</dt>
            <dd>
                <p><?php echo $skills?>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Experience</dt>
            <dd>
            <?php echo $experience?>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Hobbies</dt>
            <dd><?php echo $hobbies?></dd>
            
            <dd class="clear"></dd>
            
            <dt>Linked In:</dt>
            <dd><a href="<?php echo $linkedin ?>"<p><?php echo $name?>'s Linked In  </a></dd>
            
            <dd class="clear"></dd>
        </dl>
        
        <div class="clear"></div>
    
    </div>

</body>

</html>