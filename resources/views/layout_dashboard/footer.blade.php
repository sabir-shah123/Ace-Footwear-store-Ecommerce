

<!-- Required Js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/dassets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('assets/dassets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/dassets/js/pcoded.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/notify.min.js')}}"></script>
<!-- datatable Js -->
<script src="{{asset('assets/dassets/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{asset('assets/dassets/js/pages/tbl-datatable-custom.js')}}"></script>


<script>
   <?php $i=0;$error="error"; $n=' $.notify('?>
@if ($message = Session::get('success'))


           <?php $i=1; $n.=$message;$error = "success";?>

@elseif ($message = Session::get('error'))

   <?php $i=1;$n.=$message;$error = "error";?>


@elseif ($message = Session::get('warning'))


   <?php $i=1;$n.=$message;$error = "warning";?>


@elseif ($message = Session::get('info'))
           <?php $i=1;$n.=$message;$error = "info";?>
    @endif
  <?php  $n.=','.$error.')'; if($i==1) echo $n;?>


</script>