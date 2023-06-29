  
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="utf-8">
    <?php include("../inc/db.php"); ?>
    <?php include("./dist/_partials/head.php"); ?>
    <?php
      
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/assets/dist/img/court.jpg" type="img/x-icon">
    <title>Fleet Management</title>
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
    <body class = "bg-light hold-transition sidebar-mini">
    <nav class = "navbar navbar-expand-md navbar-dark fixed-top pt-0 pb-0" id = "navbar_index_login" style ="background-color:#191970;">
    <a class = "navbar-brand" id = "navbar-brand-index" href="index.php">
    <img class="img-fluid img-responsive" src="assets/dist/img/forex7.png" alt="Fleet Management"
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
       <a class = "nav-link" href="./login">Admin LogIn</a>
     </li>
    </ul>
    </div>
    </nav>
    <div class="container mb-5 mt-5 p-4">
    <div class="row justify-content-center">
    <div class="col-lg-4 col-xs-12">
    <div class="">
    </div>
    <div class="card card-success">
    <div class="card-header text-center text-white font-weight-bold fs-6" id = "navbar-brand">Admin Login to FMTAF</div>
    <div class="card-body bg-dark">

    <div class = "row mb-3">
    <div class="flex-column text-center">
    <img class="img-fluid img-circle" src="assets/dist/img/forex7.png" alt="Fleet Management" height="" width="110">
    </div>
    </div>
    <form method="POST" action="login">
    <div class="row mb-2" id = "input-data">
    <div class="form-group form-style">
    <label for="email" class="col-form-label text-md-end form-style text-sm text-white">Email</label>
    <div class = "input-group">
        <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        <input id="email" type="email" class="form-control form-control-sm" name="email">
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
            <input class="form-check-input" type="checkbox" name="remember" id="remember" 'remember') ? 'checked' : ''>

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

    </form>
    </div>
    </div>
    </div>
    </div>
    </div>

    <footer class="footer bg-white text-lg-start mt-5 fixed-bottom">
    <!-- Copyright -->
    <div class="p-3">
    <strong>&copy; <a href="https://mglsd.go.ug">Ministry FMIS</a>.</strong>
    <div class="float-right d-none d-sm-inline text-success">
    <b id = "wrapper">FMIS</b> Version
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.js"></script>
    <script src="assets/dist/js/ministry.js"></script>
    </body>
    </html>
