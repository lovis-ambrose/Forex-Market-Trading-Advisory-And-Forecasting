
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- CSRF Token -->
<link rel="icon" href="/assets/dist/img/court.jpg" type="img/x-icon">
<title>Forex Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<link rel="stylesheet" href="assets/dist/css/app.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!--font Awesome v4-->

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body class ="bg-light hold-transition sidebar-mini">
  <nav class = "navbar navbar-expand-md navbar-dark fixed-top pt-0 pb-0" id = "navbar_index_login" style ="background-color:#191970;">
    <a class = "navbar-brand" id = "navbar-brand-index" href="index1.php">
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
           <a class = "nav-link" href="index">Home</a>
         </li>

         <li class = "nav-item">
           <a class = "nav-link" href="login">Sign In</a>
         </li>

         <li class = "nav-item">
           <a class = "nav-link" href="register">Create Account</a>
         </li>
       </ul>
    </div>
  </nav>

<div class="container mt-5 mb-5 pt-3">

<div class="row justify-content-center">
  <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12">
  </div>
<div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
<div class="card">
<div class="card-header bg-success text-center text-dark fw-bold fs-6" id = "navbar-brand">Register on FMTAF</div>

<div class="card-body bg-dark">
<div class = "row mb-3">
<div class="flex-column text-center">
<img class="img-fluid img-circle" src="assets/dist/img/forex7.png" alt="Fleet Management" height="" width="110">
</div>
</div>
<form method="POST" action="register">
<div class="row">
<div class="col-sm-6">
  <!-- text input -->
  <div class="form-group form-style">
    <label for ="fname" class = "col-form-label text-md-end text-sm">First Name</label>
    <div class="input-group">
      <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
    <input type="text" class="form-control form-control-sm" placeholder="FirstName" name ="fname">
    </div>

  </div>
</div>
<div class="col-sm-6">
  <!-- text input -->
  <div class="form-group form-style">
    <label for = "lname" class = "col-form-label text-md-end text-sm">Last Name</label>
    <div class="input-group">
      <span class="input-group-text"><i class="fa fa-address-book" aria-hidden="true"></i></span>
    <input type="text" class="form-control form-control-sm" placeholder="FirstName" name = "lname">
    </div>

</div>
</div>

<div class="row mb-3">
  <div class="form-group form-style">
      <label for="email" class="col-form-label text-md-end text-sm">Email Address</label>
      <div class = "input-group">
      <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
      <input id="email" type="email" class="form-control form-control-sm" name="email"  placeholder = "first.second@mglsd.ac.ug">
  </div>

  </div>
</div>
<div class="row mb-3">
  <div class="form-group form-style">
      <label for="gender" class="col-form-label text-md-end text-sm">Gender</label>
      <div class = "input-group">
      <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
      <select name="gender" id="gender" class = "form-control shadow-none rounded form-control-sm">
          <option value="">Choose gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
      </select>
  </div>

  </div>
</div>

<div class="row mb-3">
  <div class="form-group form-style">
      <label for="password" class="col-form-label text-md-end text-sm">Password</label>
      <div class = "input-group">
          <span class="input-group-text"> <i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
      <input id="password" type="password" class="form-control form-control-sm" name="password" autocomplete="new-password" placeholder = "insert password">
  </div>

  </div>
</div>

<div class="row mb-3">
  <div class="form-group form-style">
      <label for="password_confirm" class="col-form-label text-md-end text-sm">Confirm Password</label>
      <div class = "input-group">
          <span class="input-group-text"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
      <input id="confirm_password" type="password" class="form-control form-control-sm" name="confirm_password" autocomplete="new-password" placeholder = "Comfirm password">
     </div>

  </div>
</div>

<div class="row mb-0">
  <div class="offset-md-0">
  <button type="submit" class="btn btn-danger btn-block btn-sm" name = "register">Register</button>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<footer class="footer bg-white text-lg-start mt-5">
<!-- Copyright -->
<div class="p-3">
<strong>&copy; <a href="https://mglsd.go.ug">FMTAF</a>.</strong>
<div class="float-right d-none d-sm-inline text-success">
<b id = "wrapper">FMTAF</b> Version
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
<script type="text/javascript">
var select_box_element = document.querySelector('#select_box');
 dselect(select_box_element, {
   search: true
 });

</script>

</body>
</html>
