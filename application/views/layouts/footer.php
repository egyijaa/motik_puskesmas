<footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>
</div>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js?t=<?php echo time();?>">
        </script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>/assets/adminLte/dist/js/adminlte.js?t=<?php echo time();?>"></script>

        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/sparklines/sparkline.js?t=<?php echo time();?>">
        </script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/moment/moment.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/daterangepicker/daterangepicker.js?t=<?php echo time();?>">
        </script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js?t=<?php echo time();?>">
        </script>
        <!-- jQuery UI 1.11.4 -->
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-ui/jquery-ui.min.js?t=<?php echo time();?>">
        </script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>

        <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/chart.js/Chart.min.js?t=<?php echo time();?>">
        </script>
        <!-- JQVMap -->
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/jqvmap/jquery.vmap.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/jqvmap/maps/jquery.vmap.usa.js?t=<?php echo time();?>">
        </script>
        <!-- jQuery Knob Chart -->
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-knob/jquery.knob.min.js?t=<?php echo time();?>">
        </script>

        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-mousewheel/jquery.mousewheel.js?t=<?php echo time();?>">
        </script>
        <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/raphael/raphael.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-mapael/jquery.mapael.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-mapael/maps/usa_states.min.js?t=<?php echo time();?>">
        </script>
        <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jszip/jszip.min.js?t=<?php echo time();?>">
        </script>
        <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/pdfmake/pdfmake.min.js?t=<?php echo time();?>">
        </script>
        <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/pdfmake/vfs_fonts.js?t=<?php echo time();?>">
        </script>
        <script>
            function display_ct5() {
                var x = new Date()
                var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';

                var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
                x1 = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
                document.getElementById('ct5').innerHTML = x1;
                display_c5();
            }
            function display_c5(){
                var refresh=1000; // Refresh rate in milli seconds
                mytime=setTimeout('display_ct5()',refresh)
            }
            display_c5()
        </script>
        
</body>

</html>