<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="">
    <title>JKSOL - Aptitude Test</title>

    <!-- Styles -->
    
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/admin/css/chartist.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/admin/css/owl.carousel.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/admin/css/owl.theme.default.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/admin/css/jquery.dataTables.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/admin/css/responsive.dataTables.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/admin/css/admin_style.css')}}" rel="stylesheet" media="screen">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/admin/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" media="screen">
    <script type="text/javascript">
        var base_url = 'aaaaaaaaaaaaaaaaaaaaa';
    </script>

</head>

<body>
    <div class="row dashboard-top-nav">
        <div class="col-sm-3 logo">
            <h5><i class="fa fa-book"></i>JKSOL</h5>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-5 notification-area">
            <ul class="top-nav-list">
                <li class="user dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span>
                            <img src="http://jksol.com/images/logo.png" alt="user">
                            {{Auth::user()->name}}
                            <span class="caret"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu notification-list">
                        <li>
                            <div class="all-notifications">
                                <a href="{{route('logout')}}">LOGOUT</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="parent-wrapper" id="outer-wrapper">
        <!-- SIDE MENU -->
        <div class="sidebar-nav-wrapper" id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="active">
                    <a href="#"><i class="fa fa-file-text-o menu-icon"></i> Questions</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user menu-icon"></i> Candidates</a>
                </li>
            </ul>
        </div>


    @yield('content')


    <!-- Scripts -->
    <script src="{{asset('assets/admin/js/jQuery_v3_2_0.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/js.js')}}"></script>


    <script src="https://test.jksol.com/assets/vendors/sweetalert/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <?php
    $page = 'manage_candidates';
    if($page == 'manage_candidates'){

        echo '<script src="{{asset("assets/admin/js/candidate_add.js?time='.time().'")}}"></script>';
    }

    if($page == 'manage_questions'){

        echo '<script src="{{asset("assets/admin/js/question_add.js")}}"></script>';
    }
    ?>

    @stack('scripts')



</body>
</html>