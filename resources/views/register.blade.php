<!DOCTYPE html>
<html lang="en">
<head >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Human Resources | Register </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="backend/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="backend/dist/css/adminlte.min.css">
<style>
    .login-page{
        background-image:  url({{ "assets/images/login4.png" }});
        background-size: cover;
        /* height: 100%;
        width: 100%; */
        background-position: center;
        /* opacity: 0.8; */
    }
</style>
</head>

<body class="hold-transition login-page">
{{-- <img src="assets/images/login.png" alt="" style="cover"> --}}
<div class="login-box" >
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Human</b>Resources</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ url('register_post') }}" method="post">

         {{ csrf_field() }}

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="name" name="name" required value=" {{ old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span style="color: red;">{{ $errors->first('name') }}</span>

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="email" name="email" required value=" {{ old('email') }}" onblur="duplicateEmail(this)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span style="color: red;">{{ $errors->first('email') }}</span>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required value=" {{ old('password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span style="color: red;">{{ $errors->first('password') }}</span>


        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password" required value=" {{ old('confirm_password') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <span style="color: red;">{{ $errors->first('confirm_password') }}</span>

        <div class="row">
          <div class="col-8">
            {{-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> --}}
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> --}}
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ url('forgot-password')}}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{ url('/')}}" class="text-center">Sign Up!</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="backend/dist/js/adminlte.min.js"></script>

{{-- <script type="text/javascript">
    function duplicateEmail(element){
        var email = $(element).val();
        // alert(email);
        $.ajax({
            type : "POST",
            url :  '{{ url('checkmail')}}',
            data : {
                email: email,
                _token: "{{ csrf_token()}}"
            },
            dataType : "json",
            success : function(res){
              if(res.exists){
                $('.duplicate_message').html("That email is taken.Try aanother");
              }
              else{
                $('.duplicate_message').html("");
              }
            },
            error:function(jqXHR , exception){

            }
        });
    }

</script> --}}
</body>
</html>


