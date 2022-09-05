<!-- jquery -->
<script src="{{ URL::asset('FrontEnd/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('FrontEnd/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('FrontEnd/js') }}/';</script>

<!-- chart -->
<script src="{{ URL::asset('FrontEnd/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('FrontEnd/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('FrontEnd/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('FrontEnd/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('FrontEnd/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('FrontEnd/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('FrontEnd/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('FrontEnd/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('FrontEnd/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('FrontEnd/js/custom.js') }}"></script>
<!-- My main.js -->
<script src="{{ URL::asset('FrontEnd/js/myMain.js') }}"></script>

<script>
    debugger
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>


@if (App::getLocale() == 'en')
    <script src="{{ URL::asset('FrontEnd/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('FrontEnd/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>
@else
    <script src="{{ URL::asset('FrontEnd/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('FrontEnd/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>
@endif
