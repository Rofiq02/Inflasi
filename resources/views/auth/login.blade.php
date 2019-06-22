<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inflasi | Log in</title>
    @include('sc_head')

    <style>
      .login-logo img{
        width:110px;
      }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="img/bps.png">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><b>Silahkan Login</b></p>
    <!-- Pesan Error -->
    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>Email Salah</strong>
        </span>
    @endif

    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>Password Salah</strong>
        </span>
    @endif  
     <!-- End Pesan Error -->  
    <form action="{{ route('login') }}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!--<a href="{{ __('register') }}" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
@include('sc_footer')
</body>
</html>
