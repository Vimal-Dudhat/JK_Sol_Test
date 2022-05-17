<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="author" content="JKSOL">
  <title>Welcome to JKSOL</title>
  <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon/apple-touch-icon-152x152.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon/favicon-32x32.png')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/icon.css')}}">

  <!-- BEGIN: VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/vendors.min.css')}}">
  <!-- END: VENDOR CSS-->
  <!-- BEGIN: Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themes/vertical-modern-menu-template/materialize_v2.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themes/vertical-modern-menu-template/style_v2.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/login.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layout.css')}}">
  <!-- END: Page Level CSS-->
</head>
<!-- END: Head-->
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column login-bg  blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
  <div class="row">
    <div class="col s12">
      <div class="container"><div id="login-page" class="row">
        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
          <form class="login-form" method='post' action="{{route('user.login')}}">
            @csrf
            <div class="row">
              <div class="input-field col s12">
                <h5 class="ml-4">Sign in</h5>
              </div>
            </div>

            <div class="row margin">
              
              @if (!empty($msg))    
                <div class="card-alert card red lighten-5">
                    <div class="card-content red-text">
                    <p>{{$msg}}</p>
                    </div>
                    <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
              @endif

            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <i class="material-icons prefix pt-2">person_outline</i>
                <input id="username" name="user_name"  type="text" required>
                <label for="username" class="center-align">Username</label>
                {{-- <?php echo form_error('username'); ?> --}}
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <i class="material-icons prefix pt-2">lock_outline</i>
                <input id="password" name="password"  type="password" required>
                <label for="password">Password</label>
                {{-- <?php echo form_error('password'); ?> --}}
              </div>
            </div>
            <div class="row m-b-20">
              <div class="input-field col s12">
                <button type='submit' class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12" >Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- BEGIN VENDOR JS-->
<script src="{{asset('assets/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="{{asset('assets/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/scripts/ui-alerts.js')}}" type="text/javascript"></script>

<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>