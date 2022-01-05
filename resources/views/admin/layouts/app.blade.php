<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.layouts.head')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed skin-blue"> 
        <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        @section('main-content')
            @show
        @include('admin.layouts.footer')    
        </div>
    </body>
    
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('admin/plugins/inputmask/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
$(document).ready(function() {
    $('#example2').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
    </script>
    
    
<script>
    var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("min", today);

var n6 = new Date(new Date().getTime() + 144 * 60 * 60 * 1000);
    y6 = n6.getFullYear();
    m6 = n6.getMonth() + 1;
    d6 = n6.getDate();
 if(d6<10){
        d6='0'+d6
    } 
    if(m6<10){
        m6='0'+m6
    } 

week = y6+'-'+m6+'-'+d6;
document.getElementById("datefield").setAttribute("max", week);
    
    </script>
    
<script>
    function yesnoCheck(that) {
    if (that.value === "Sporto klubo treneris" || that.value === "Administratorius") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
};
    </script>
    
<script>
 $(function () {
  selection = document.getElementById("role");
  if(selection.value === "Sporto klubo treneris" || selection.value === "Administratorius") {
      document.getElementById("ifYes").style.display = "block";}
  });
    </script>
</html>