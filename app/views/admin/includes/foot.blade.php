 <!-- jQuery 2.1.4 -->
    {{ HTML::script('public/assets/admin/plugins/jQuery/jQuery-2.1.4.min.js') }}
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    {{ HTML::script('public/assets/admin/bootstrap/js/bootstrap.min.js') }}
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    {{ HTML::script('public/assets/admin/plugins/morris/morris.min.js') }}
    <!-- Sparkline -->
    {{ HTML::script('public/assets/admin/plugins/sparkline/jquery.sparkline.min.js') }}
    <!-- jvectormap -->
    {{ HTML::script('public/assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
    {{ HTML::script('public/assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
    <!-- jQuery Knob Chart -->
    {{ HTML::script('public/assets/admin/plugins/knob/jquery.knob.js') }}
    <!-- daterangepicker -->
    
    {{ HTML::script('public/assets/admin/plugins/input-mask/jquery.inputmask.js') }}
    {{ HTML::script('public/assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js') }}
    {{ HTML::script('public/assets/admin/plugins/input-mask/jquery.inputmask.extensions.js') }}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    {{ HTML::script('public/assets/admin/plugins/daterangepicker/daterangepicker.js') }}
    <!-- datepicker -->
    {{ HTML::script('public/assets/admin/plugins/datepicker/bootstrap-datepicker.js') }}
    <!-- DataTable -->
    {{ HTML::script('public/assets/admin/plugins/datatables/jquery.dataTables.min.js') }}
    {{ HTML::script('public/assets/admin/plugins/datatables/dataTables.bootstrap.min.js') }}
    
    {{ HTML::script('public/assets/admin/plugins/datatables/dataTables.bootstrap.min.js') }}
    <!-- Bootstrap WYSIHTML5 -->
    {{ HTML::script('public/assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
    <!-- Slimscroll -->
    {{ HTML::script('public/assets/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}
    <!-- FastClick -->
    {{ HTML::script('public/assets/admin/plugins/fastclick/fastclick.min.js') }}
    <!-- AdminLTE App --> 
    {{ HTML::script('public/assets/admin/dist/js/app.min.js') }}
    
    {{ HTML::script('public/assets/admin/plugins/iCheck/icheck.min.js') }}
    
    {{ HTML::script('public/assets/admin/plugins/chartjs/Chart.js') }}
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
      // For using date picker
      $(function() {
          $( "#start_date" ).datepicker();
          $( "#end_date" ).datepicker();
     });
     
     $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });

 $(document).ready(function () {
         //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
});


    </script>