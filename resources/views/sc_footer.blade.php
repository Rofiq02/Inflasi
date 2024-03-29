<!-- REQUIRED JS SCRIPTS -->

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('component/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('component/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('component/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('component/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('component/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('component/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('component/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('component/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('component/fastclick/lib/fastclick.js') }}"></script>
<!-- Sweet Alert -->
<script src="{{ asset('component/sweetalert/sweetalert2.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('component/chart.js/Chart.js') }}"></script>
<!-- FLOT CHARTS -->
<script src="{{ asset('component/Flot/jquery.flot.js') }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('component/Flot/jquery.flot.resize.js') }}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('component/Flot/jquery.flot.pie.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('component/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('component/morris.js/morris.min.js') }}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ asset('component/Flot/jquery.flot.categories.js') }}"></script>
<!-- Print Area-->
<script src="{{ asset('js/jquery.PrintArea.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>

@yield('script')
