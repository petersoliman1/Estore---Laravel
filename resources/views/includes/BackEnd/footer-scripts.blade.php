<!-- jquery -->
<script src="{{ URL::asset('BackEnd/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('BackEnd/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('BackEnd/js') }}/';</script>

<!-- chart -->
<script src="{{ URL::asset('BackEnd/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('BackEnd/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('BackEnd/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('BackEnd/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('BackEnd/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('BackEnd/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('BackEnd/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('BackEnd/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('BackEnd/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('BackEnd/js/custom.js') }}"></script>
<!-- My main.js -->
<script src="{{ URL::asset('BackEnd/js/mymain.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>



@if (App::getLocale() == 'en')
    <script src="{{ URL::asset('BackEnd/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('BackEnd/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>
@else
    <script src="{{ URL::asset('BackEnd/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('BackEnd/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>
@endif
