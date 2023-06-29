  
    <!DOCTYPE html>
    <?php 
     session_start();
     $success='';
     $err ='';
     include('./conf/config.php');
     if (isset($_POST['login'])) {
       $email = $_POST['email'];
       $password = sha1(md5($_POST['password'])); //double encrypt to increase security
       $stmt = $conn->prepare("SELECT email, password, f_id  FROM f_clients   WHERE email=? AND password=?"); //sql to log in user
       $stmt->bind_param('ss', $email, $password); //bind fetched parameters
       $stmt->execute(); //execute bind
       $stmt->bind_result($email, $password, $f_id); //bind result
       $rs = $stmt->fetch();
       $_SESSION['f_id'] = $f_id; //assaign session toc lient id
       //$uip=$_SERVER['REMOTE_ADDR'];
       //$ldate=date('d/m/Y h:i:s', time());
       if ($rs) { //if its sucessfull
         header("location:pages_dashboard");
       } else {
         #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
         $err = "<div class='alert alert-danger mt-2'>Access Denied, Check Your Credentials</div>";
       }
     }
    ?>
    <?php
      $ret = "SELECT * FROM f_systemsettings";
      $stmt = $conn->prepare($ret);
      $stmt->execute();
      $res=$stmt->get_result();
      while($sys=$res->fetch_object()){
    ?>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/assets/dist/img/court.jpg" type="img/x-icon">
    <title><?php echo $sys->sys_name;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/dist/css/app.css">
    </head>
    <body class = "bg-light hold-transition sidebar-mini" style="background-image: url('../assets/dist/img/BG/img2.avif');">
    <nav class = "navbar navbar-expand-md navbar-dark fixed-top pt-0 pb-0" id = "navbar_index_login" style ="background-color:#191970;">
    <a class = "navbar-brand" id = "navbar-brand-index" href="./login.php">
    <img class="img-fluid img-responsive" src="assets/dist/img/forex7.png" alt="FMTAF logo"
    height="" width="40" style ="border-radius:40%;"><span class = "text-white parag">FMTAF</span>
    </a>

    <button type="button" class = "navbar-toggler" data-bs-toggle = "collapse" data-bs-target = "#navbarResponsive"
    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class = "navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id = "navbarResponsive">
    <ul class = "navbar-nav ms-auto mb-2 mb-lg-0" id = "navbar-nav">
     <li class = "nav-item">
       <a class = "nav-link" href="../index">Home</a>
     </li>

     <li class = "nav-item">
       <a class = "nav-link" href="./login">Login</a>
     </li>

     <li class = "nav-item">
       <a class = "nav-link" href="./register">Sign Up</a>
     </li>
    </ul>
    </div>
    </nav>
    
        <?php
         //$output = exec("python ../WEBFX/script.py");
         //echo $output;
         ?>
      </p>
    </div>

    </div>
    <!--This is the python code goes here-->
    <div class="container mb-5 mt-5 p-4">
    <div class="row justify-content-center">
    <div class="col-lg-4 col-xs-12">
    <div class="">
    </div>

    <div class="card card-success">
    <div class="card-header text-center text-white font-weight-bold fs-6" id = "navbar-brand">Login to use <?php echo $sys->sys_name;?></div>
    
    <div class="card-body bg-dark">
    <div class = "row mb-1">
    <div class="flex-column text-center">
    <img class="img-fluid img-circle" src="assets/dist/img/forex7.png" alt="Fleet Management" height="" width="110">
    </div>
    <div class="text-center">
      <!--Check for the loging success-->
    <?php 
      echo $err;
    ?>
    </div>
    </div>
    <form method="POST" action="login">
    <div class="row mb-2" id = "input-data">
    <div class="form-group form-style">
    <label for="email" class="col-form-label text-md-end form-style text-sm text-white">Email</label>
    <div class = "input-group">
        <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        <input id="email" type="text" class="form-control form-control-sm" name="email">
        </div>
       
    </div>
    </div>

    <div class="row mb-2">
    <div class="form-group form-style" id = "input-data">
        <label for="password" class="col-form-label text-md-end text-sm text-white">Password</label>
        <div class = "input-group">
            <span class = "input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
            <input id="password" type="password" class="form-control form-control-sm" name="password">
        </div>
        
    </div>
    </div>

    <div class="row mb-3">
    <div class="offset-md-0">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">
                Remember Me
            </label>
        </div>
    </div>
    </div>
    <div class="row mb-3">
    <div class = "w-100 d-grid gap-2 mx-auto">
    <button type="submit" class="btn btn-danger btn-sm" name = "login">
    Login <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
    </button>
    </div>

    <a class="nav-link text-center" href="/password.request">
         Forgot Your Password?
            </a>
        <div class = "mx-2 w-100 ">
        Don't have an account?
          <a class="btn btn-success text-white ms-3 btn-sm" href="register">
          <i class="fa fa-user me-1" aria-hidden="true"></i>
            Register
    </a>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>

    <footer class="footer bg-white text-lg-start mt-5 fixed-bottom">
    <!-- Copyright -->
    <div class="p-3">
    <!-- <strong>&copy; <a href="https://mglsd.go.ug">FMTAF</a>.</strong> -->
    <div class="float-right d-none d-sm-inline text-success">
    <b id = "wrapper">FMTAF</b> Version 1.0.0
    </div>
    <!-- Copyright -->
    </footer>

    <script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
    console.error( error );
    } );
    </script>

    <script type="text/javascript">
    $("#start-date").datepicker({
  dateFormat: 'yy-mm-dd',
  onSelect: function(dateText, inst) {
    $(inst).val(dateText); // Write the value in the input
  }
  });

  // Code below to avoid the classic date-picker
  $("#start-date").on('click', function() {
  return false;
  });
    </script>
    <!-- AdminLTE App -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    </body>
    </html>
    <?php }?>
