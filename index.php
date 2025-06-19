<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Aplikasi Kepegawaian</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.4 -->
  <link href="aset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="aset/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="aset/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

  <link href="aset/dist/css/style.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
    body,
    html {
      height: 100%;
      background-repeat: no-repeat;
      background-color: #d3d3d3;
      /* font-family: 'Oxygen', sans-serif; */
    }

    .main {
      margin-top: 70px;
    }

    h1.title {
      font-size: 50px;
      /* font-family: 'Passion One', cursive; */
      font-weight: 400;
    }

    hr {
      width: 10%;
      color: #fff;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      margin-bottom: 15px;
    }

    input,
    input::-webkit-input-placeholder {
      font-size: 11px;
      padding-top: 3px;
    }

    .main-login {
      background-color: #fff;
      /* shadows and rounded borders */
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      border-radius: 2px;
      -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

    }

    .main-center {
      margin-top: 30px;
      margin: 0 auto;
      max-width: 330px;
      padding: 40px 40px;

    }

    .login-button {
      margin-top: 5px;
    }

    .login-register {
      font-size: 11px;
      text-align: center;
    }
  </style>
</head>

<body class="login-page">


  <!-- <div class="login-logo" style="margin:70px auto 20px;width:360px;text-align:left;">

    <div style="font-size:24px;color: #111;font-weight:400;"><i class="fa fa-windows text-primary" style="color:#007aff;font-size:28px;margin:0 10px 0 0;"></i>APLIKASI KEPEGAWAIAN</div>
    <div style="font-size:15px;color: #777;">Selamat datang pada aplikasi kepegawaian</div>
  </div>



  <div class="login-box-page">
    <div class="login-box-body ">
      <form name="login-form" action="cek_login.php" class="login-form" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control input-lg" placeholder="Username" />
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input name="password" type="password" class="form-control input-lg" placeholder="Password" />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <button type="submit" name="submit" class="btn btn-success input-lg btn-block btn-login">Login</button>

      </form> -->

  <!--</div> /.login-box-body -->
  <!-- </div> /.login-box -->
  <!-- jQuery 2.1.4 -->
  <!-- <script src="aset/plugins/jQuery/jQuery-2.1.4.min.js"></script> -->
  <!-- Bootstrap 3.3.2 JS -->
  <!-- <script src="aset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
  <!-- iCheck -->
  <!-- <script src="aset/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script> -->

  <div class="container">
    <div class="row main marginlogologin">
      <div class="panel-heading">
        <div class="panel-title text-center">
          <!-- <h1 class="title"></h1> -->

          <!-- <hr /> -->
        </div>
      </div>
      <div class="main-login main-center">
        <img src="images/logo-disdik-minahasa.png" alt="" width="250px">
        <form name="login-form" action="cek_login.php" class="form-horizontal" method="post">
          <div class="form-group">
            <label for="username" class="cols-sm-2 control-label">Username</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <input type="text" name="username" class="form-control" name="username" id="username" placeholder="Enter your Username" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="cols-sm-2 control-label">Password</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                <input type="password" name="password" class="form-control" name="password" id="password" placeholder="Enter your Password" />
              </div>
            </div>
          </div>

          <div class="form-group ">
            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
          </div>
          <!-- <div class="login-register">
            <a href="create_account.php">Create account</a> or <a href="reset_password.php">reset password</a>
          </div> -->
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>

</html>