                </div>
            </section>
        </div>
    </div>
    
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2015 <a class="grey-text text-lighten-4" href="http://wsdc.nitw.ac.in" target="_blank">WSDC</a> All rights reserved.
                <span class="right"> Designed and Developed by <a class="grey-text text-lighten-4" href="http://wsdc.nitw.ac.in">WSDC</a></span>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/prism.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
    

    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/chartist-js/chartist.min.js')?>"></script>   

    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/sparkline/sparkline-script.js')?>"></script>
    
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins/jvectormap/vectormap-script.js')?>"></script>    

    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/plugins.js')?>"></script>
    <script src="<?php echo base_url()?>assets/materialize/js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery-ui/jquery-ui.js')?>"></script>
    <script type="text/javascript">
        $(function(){
  $("#student").autocomplete({
    source: "admin/get_student"
  });
});
    </script>
</body>

</html>