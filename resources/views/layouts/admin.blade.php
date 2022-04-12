<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <title> @yield('title') </title>

    <link rel="icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.ico') }}"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('backend/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

    <link href="{{ asset('backend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/default-dashboard/style.css') }}" />    

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/datatables.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/custom_dt_customer.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/file-upload/file-upload-with-preview.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/color_pickers/jquery_minicolors/jquery.minicolors.css') }}" />  
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->   

    <!-- Extra Css -->
        @yield('custom-css')

        <style>
            .form-control {
                border: 1px solid #ccc;
                color: #888ea8;
                font-size: 15px;
                border-radius: 2px;
            }
            .form-vertical .form-group .control-label { color: #3b3f5c; }
            .form-control::-webkit-input-placeholder { color: #888ea8; font-size: 15px; }
            .form-control::-ms-input-placeholder { color: #888ea8; font-size: 15px; }
            .form-control::-moz-placeholder { color: #888ea8; font-size: 15px; }
            .form-control:focus { border-color: #f1f3f1; border-left: solid 3px #3862f5; }
            label { color: #3b3f5c; margin-bottom: 14px; }
        </style>
    <!-- Extra Css End -->
</head>

<body class="default-sidebar">

    <div id="eq-loader">
      <div class="eq-loader-div">
          <div class="eq-loading dual-loader mx-auto mb-5"></div>
      </div>
    </div>

    <!-- Header Start -->
        @include('partials.backend.header')
    <!-- Header End -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>

        <div class="cs-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
            @include('partials.backend.sidebar')   
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <!-- Sweetalert -->
                @include('sweetalert::alert')
            <!-- Sweetalert -->

            <div class="container">
                @yield('content')
            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('backend/assets/js/libs/jquery-3.1.1.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/loader.js') }}"></script>

    <script src="{{ asset('backend/bootstrap/js/popper.min.js') }}"></script>

    <script src="{{ asset('backend/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>

    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>    
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- <script src="{{ asset('backend/assets/js/default-dashboard/default-custom.js') }}"></script> -->

    <script src="{{ asset('backend/plugins/table/datatable/datatables.js') }}"></script>

    <script>
        c2 = $('#customer-info-detail-2').DataTable({
            "lengthMenu": [ 5, 10, 20, 50, 100 ],
            /*headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-primary m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-primary  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],*/
            "language": {
                "paginate": {
                  "previous": "<i class='flaticon-arrow-left-1'></i>",
                  "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            }
        });

        multiCheck(c2);
    </script>    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- Extra JS -->
        @yield('custom-js')
    <!-- Extra JS End -->

    <!-- Custom Js -->
    <script>
        $(document).ready(function(){

            var pathname = window.location.pathname.split( '/' );

            if ( pathname[3] ) {

                var url = location.protocol + '//' + location.hostname + '/' +pathname[1] + '/' + pathname[2] + '/' + pathname[3];

            } else {

                var url = location.protocol + '//' + location.hostname + '/' +pathname[1] + '/' + pathname[2];

            }    

            if( url ) { 

                $('.main-menu').removeClass('active');

                $('a[href="'+url+'"]').parent('li').addClass('active');

                $('a[href="'+url+'"]').parent('li').parent('ul').addClass('show');

            }   else {

                $('.main-menu').addClass('active');

            }        

        });
    </script>

    <!-- Slugify Start -->
        <script type="text/javascript">
            $("#name").keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug").val(Text);
            });
        </script>
    <!-- Slugify End -->
    <!-- Custom Js End -->
</body>

</html>