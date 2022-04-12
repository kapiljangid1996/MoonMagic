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
    <link href="{{ asset('backend/assets/css/support-chat.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/plugins/charts/chartist/chartist.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('backend/assets/css/default-dashboard/style.css') }}" rel="stylesheet" type="text/css" />    
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->   

    <!-- Extra Css -->
        @yield('custom-css')
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
    <!-- <script src="{{ asset('backend/plugins/charts/chartist/chartist.js') }}"></script> -->

    <!-- <script src="{{ asset('backend/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.min.js') }}"></script> -->

    <!-- <script src="{{ asset('backend/plugins/maps/vector/jvector/worldmap_script/jquery-jvectormap-world-mill-en.js') }}"></script> -->

    <!-- <script src="{{ asset('backend/plugins/calendar/pignose/moment.latest.min.js') }}"></script> -->

    <!-- <script src="{{ asset('backend/plugins/calendar/pignose/pignose.calendar.js') }}"></script> -->

    <!-- <script src="{{ asset('backend/plugins/progressbar/progressbar.min.js') }}"></script> -->

    <!-- <script src="{{ asset('backend/assets/js/default-dashboard/default-custom.js') }}"></script> -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- Extra JS -->
        @yield('custom-js')
    <!-- Extra JS End -->
</body>

</html>