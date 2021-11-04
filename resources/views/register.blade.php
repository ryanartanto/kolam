<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{url('admin2/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('admin2/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('admin2/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('admin2/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin2/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('admin2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('admin2/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Register
                </div>
                <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="card-body">
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-4"><strong>Username</strong></label>
                        <input type="text" name="username" class="form-control col-md-6" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4"><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control col-md-6" placeholder="Password">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4"><strong>Konfirmasi Password</strong></label>
                        <input type="password" name="password_confirmation" class="form-control col-md-6" placeholder="Password">
                    </div>
                </div>
                <div class="card-footer">
                   <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                        register
                      </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

