					</div>
				</section>
			</div>
		</div>

		<footer class="page-footer">
			<div class="footer-copyright">
				<div class="container">
					Copyright © 2015 <a class="grey-text text-lighten-4" href="http://wsdc.nitw.ac.in" target="_blank">WSDC</a> All rights reserved.
					<span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://wsdc.nitw.ac.in">WSDC</a></span>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/materialize.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/prism.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/chartist-js/chartist.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/sparkline/sparkline-script.js')?>"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/jvectormap/vectormap-script.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/jquery-ui/jquery-ui.js')?>"></script>
		
		<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery.imgareaselect.js"></script>
		<script type="text/javascript">
			$(function(){
				$("#company").autocomplete({source: "student/get_company"});
			});
		</script>
	</body>
</html>