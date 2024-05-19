<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link href="{{asset('admin/bower_components/jquery.filer/css/jquery.filer.css')}}" type="text/css" rel="stylesheet" />
  <link href="{{asset('admin/bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')}}" type="text/css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" integrity="sha512-0V10q+b1Iumz67sVDL8LPFZEEavo6H/nBSyghr7mm9JEQkOAm91HNoZQRvQdjennBb/oEuW+8oZHVpIKq+d25g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/gritter@1.7.4/css/jquery.gritter.min.css" rel="stylesheet">
  
<style>
    .nav-sidebar>.nav-item{
      font-size: 14px;
    }
  </style>
@stack('css')

@yield('inlinecss')
</head>
<style>
    .error{
        color:#ff4444;
    }
    #editor1-error{
        display: block;
    }
    .select2-container .select2-selection--single{
      height: auto!important;
    }
</style>
<script type="text/javascript">

    var base_url = "{!!url('/')!!}"

    var images_limit = 1

    
  </script>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  @include('admin.layouts.pagehead')  
  @include('admin.layouts.sidebar')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('breadcrum')
    
    @yield('content')
    <!-- /.content-header -->


  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#"></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  
  $('.select2').select2();

  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/bower_components/jquery.filer/js/jquery.filer.min.js')}}"></script>
{{-- <script src="{{asset('admin/js/jquery.validate.min.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha512-zP5W8791v1A6FToy+viyoyUUyjCzx+4K8XZCKzW28AnCoepPNIXecxh9mvGuy3Rt78OzEsU+VCvcObwAMvBAww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/gritter@1.7.4/js/jquery.gritter.min.js"></script>

@stack('js')
@yield('inlinejs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  console.log("{{Auth()->guard('admin')->user()->id}}");
        function buttonLoading(processType, ele){
        if(processType == 'loading'){
            ele.html(ele.attr('data-loading-text'));
            ele.attr('disabled', true);
        }else{
            ele.html(ele.attr('data-rest-text'));
            ele.attr('disabled', false);
        }
    }

    function successMsg(heading,message, html = ""){
        Swal.fire({
            title: heading,
            text: message,
            icon: 'success',
            confirmButtonText: 'Ok !'
            }).then((result) => {
                if (result.isConfirmed) {
                    if(html!=''){
                        location.href = html;
                    }else{
                        location.reload();
                    }
                    
                }
            })
    }

    function errorMsg(heading,message){

        Swal.fire({
            title: heading,
            text: message,
            icon: 'danger',
            showCancelButton: false,
            
            confirmButtonText: 'Ok !'
            }).then((result) => {
                if (result.isConfirmed) {
                
                }
            })
    }

const baseurl="{{url('')}}";
function changeStatus(table , _id,  changedval, _this) {

    var _id = _this.data("id");
    var url = _this.data("url");
    var field = _this.data("field");


    var defaultMsg = 'Do you really want to process this action !';
    $.confirm({
        title: 'Alert',
        content: defaultMsg,
        icon: 'fa fa-exclamation-circle',
        animation: 'scale',
        closeAnimation: 'scale',
        opacity: 0.5,
        theme: 'supervan',
        buttons: {
            'confirm': {
                text: 'Yes',
                btnClass: 'btn-blue',
                action: function () {
                    if (url == undefined) {
                        url = baseurl + '/change-flag/' + table + '/'+_id;
                    }
                    if (field == undefined) {
                        field = 'status';
                    }
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {id: _id,field:field, status: changedval},
                        dataType: 'json',
                        headers: {
                            "accept": "application/json",
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function (xhr) {
                            //xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
                        },
                        complete: function () {
                        },
                        success: function (record) {
                            if(record.status == false){
                                swal(record.message);
                                _this.bootstrapSwitch('state', true,'skip');
                            }else{
                                wowMsg(record.message);
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                }
            },
            cancelAction: {
                text: 'Cancel',
                action: function () {
                   if (changedval == 1) {
                        _this.bootstrapSwitch('state', false,'skip');
                    } else {
                        _this.bootstrapSwitch('state', true,'skip');
                    }
                }
            }
        }

});
}


function wowMsg(str, subjtitle) {
    if (typeof (subjtitle) == "undefined")
        subjtitle = "Message Box";
    var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: subjtitle,
        // (string | mandatory) the text inside the notification
        text: str,
        // (string | optional) the image to display on the left
        // image: './assets/img/avatar1.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: true,
        // (int | optional) the time you want it to be alive for before fading out
        time: '',
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
    });

    // You can have it return a unique id, this can be used to manually remove it later using
    setTimeout(function () {
        $.gritter.remove(unique_id, {
            fade: true,
            speed: 'slow'
        });
    }, 4000);
}

function confirmThis(e) {
    e.preventDefault();
    defaultMsg  = "sdsdsd";
    $.confirm({
        title: 'Alert',
        content: defaultMsg,
        icon: 'fa fa-exclamation-circle',
        animation: 'scale',
        closeAnimation: 'scale',
        opacity: 0.5,
        theme: 'supervan',
        buttons: {
            'confirm': {
                text: 'Yes',
                btnClass: 'btn-blue',
                action: function () {
                    return true;
                }
            },
            cancelAction: {
                text: 'Cancel',
                action: function () {
                   return false;
                }
            }
        }

});
//return false;
}
  
    $(document).on('click','.deleteButton', function(){
          // Show SweetAlert popup with confirm button
          var url = $(this).attr('data-url');

          Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do it!',
          }).then((result) => {
            if (result.isConfirmed) {
              // Show loader on confirm
              Swal.fire({
                title: 'Loading...',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                  Swal.showLoading();
                },
              });

              // Perform the action (API call, etc.)
              performApiCall(url)
                .then(() => {
                  // Close the SweetAlert popup after the action is complete
                  Swal.close();

                  // Show a success message (optional)
                  Swal.fire({
                    icon: 'success',
                    title: 'Action completed successfully!',
                    showConfirmButton: false,
                    timer: 1500 // Adjust the time according to your preference
                  });

                  row = $(this).closest('tr');
                  row.remove();
                })
                .catch((error) => {
                  // Close the SweetAlert popup after the action is complete
                  Swal.close();

                  // Show an error message (optional)
                  Swal.fire({
                    icon: 'error',
                    title: 'Error performing action',
                    text: error.message // Display an appropriate error message
                  });
                });
            }
          });
  });


  function performApiCall(url) {
  // Replace the URL with your API endpoint
  const apiUrl = url;//'https://api.example.com/endpoint';

  // Replace this data with your actual payload for the API call (if needed)
  const requestData = {
    '_token':'{{csrf_token()}}'
  };

  // Return a Promise that resolves when the API call is completed successfully
  return new Promise((resolve, reject) => {
    $.ajax({
      url: apiUrl,
      type: 'POST', // Change the HTTP method as per your API requirements
      data: requestData,
      success: function(response) {
        // If the API call is successful, resolve the Promise
        resolve(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // If the API call fails, reject the Promise with the error message
        reject(new Error(errorThrown));
      }
    });
  });
}

</script>

<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('admin/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script> --}}
</body>
</html>
