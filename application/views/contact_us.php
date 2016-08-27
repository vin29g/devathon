
<title> Contact | TAPS NITW</title>
<?php if(isset($sent)){ ?>
<div class="modal" id="sent">
	Email <?php if(!$sent){echo 'not ';} ?>sent.<?php if($sent){echo ' You will get a reply soon';} ?>
</div>
<script type="text/javascript">
	$("#sent").openModal();
</script>
<?php } ?>
<div class="modal" id="lolx">
	Email qwertyuiop
</div>
<script type="text/javascript">
	$("#lolx").openModal();
</script>
<div class="row">
	<div class="col s12" align="center">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7589.855589934572!2d79.53144606293918!3d17.982096006792858!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xbd4f2f82012f7844!2sNIT+WARANGAL+MAIN+BUILDING!5e0!3m2!1sen!2sin!4v1455886021265" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
<div class="container">
	<div class="divider">
	</div>

	<div id="contact-page" class="card col s12 m12 l12">
		<div class="card-image waves-effect waves-block waves-light">
			<div id="map-canvas" data-lat="40.747688" data-lng="-74.004142"></div>
		</div>
		<div class="card-content">  
			<div class="row">
				<div class="col s12 m6">
					<form class="contact-form" action="<?php echo base_url('/main/contact_us'); ?>" method="post">
						<h1>Page under construction</h1>
						<div class="row">
							<div class="input-field col s12">
								<input id="username" type="text" name="username" required>
								<label for="username">Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="email" type="email" name="email" required>
								<label for="email">Email</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="subject" type="text" name="subject" required>
								<label for="subject">Subject</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<textarea id="message" class="materialize-textarea" name="message" required></textarea>
								<label for="message">Message</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<button class="btn cyan waves-effect waves-light right" type="submit">Send<i class="mdi-content-send right"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col s12 m6">
					<ul class="collapsible collapsible-accordion" data-collapsible="accordion">
						<li>
							<div class="collapsible-header active"><i class="mdi-communication-live-help"></i>Faculty Incharge, Training & Placement Section:
							</div>
							<div class="collapsible-body" style="">
								<p>Prof. G. Amba Prasada Rao, Professor Incharge<br>
									National Institute of Technology, Warangal<br>
									Telangana - 506 004<br>
									+91-9490165357(Mobile)
									+91-8332969315(Alternative)
								</p>
							</div>
						</li>
						<li class="active">
							<div class="collapsible-header "><i class="mdi-communication-live-help"></i>Faculty Coordinator,Training & Placement Section:
							</div>
							<div class="collapsible-body" style="display: none;">
								<p>Dr. A. V. Giridhar<br>
									National Institute of Technology, Warangal<br>
									Telangana - 506 004<br>
									+91 94901 64796 (Mobile)
								</p>
							</div>
						</li>
						<li class="active">
							<div class="collapsible-header "><i class="mdi-communication-live-help"></i>Training and Placement Officer: 
							</div>
							<div class="collapsible-body" style="display: none;">
								<p>
									National Institute of Technology, Warangal<br>
									Telangana - 506 004<br>
									Landline: 0870-2462931/32 <br>
									Email: taps@nitw.ac.in<br>
									Email: tapsnit.ac@gmail.com
								</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="card-reveal">
			<p>more info coming soon</p>
		</div>
	</div>
</div>