<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include("../inc/db.php"); ?>
<?php include("./head.php"); ?>
<?php
$success='';
$err ='';
if (isset($_POST['create_account'])) {
  //Register  Client
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $password = sha1(md5($_POST['password']));
  $c_password = sha1(md5($_POST['c_password']));
  $code = $_POST['code'];
  
  $profile_pic = $_FILES['profile_pic']['name'];
  // new variables
  $date = date("Y-m-d H:i:s");
  $expires = (time() + (60 * 1));
  

  $profile_pic  = $_FILES["profile_pic"]["name"];
  move_uploaded_file($_FILES["profile_pic"]["tmp_name"],"dist/img/".$_FILES["profile_pic"]["name"]);

  //Insert Captured information to a database table
  if(!empty($fname) && !empty($lname) && !empty($email) && !empty($gender) && !empty($password) && !empty($c_password) && !empty($date) && !empty($expires) && !empty($profile_pic)){
    //bind paramaters
    if($password==$c_password){
      //Check wether user exists
      $exis="SELECT * FROM f_clients WHERE email = '$email'";
      $qry=$conn->query($exis);
      $count = mysqli_num_rows($qry);
      //count rows if any
      if($count > 0){
        $err="<div class='alert alert-danger'>Error!!!..Email already exists, Please select another email</div>";
      }else{
        //bind results of the form fields
        $query = "INSERT INTO f_clients (fname, lname, email, gender, password, c_password, code, date, expires, profile_pic) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $rc = $stmt->bind_param('ssssssssss', $fname, $lname, $email, $gender, $password, $c_password, $code, $date, $expires, $new_file_name);
        $stmt->execute();

        //declare a varible which will be passed to alert function
      if ($stmt) {
        // This is where we shall redirect the user and send the login code.
        // Redirect to a relative URL
        header("Location: ./2FA/QR_Code/index.php");
        // $success = "<div class='alert alert-warning'>Account Created, login with code <strong>".$code."</strong> to continue</div>";
      } else {
        $err = "<div class='alert alert-danger'>Please Try Again Or Try Later</div>";
      }
      }
     
    }else{
      $err = "<div class='alert alert-danger'>Please check your Password or Email and try again</div>";
    }

  }else{
    $err = "<div class='alert alert-danger'>Please fill all fields to continue</div>";
  }


// Check if a file was selected
if (!empty($_FILES['profile_pic']['name'])) {
  $file_name = $_FILES['profile_pic']['name'];
  $file_tmp = $_FILES['profile_pic']['tmp_name'];
  $file_type = $_FILES['profile_pic']['type'];

  // Check if the selected file is an image
  $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
  $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
  if (!in_array($file_extension, $allowed_extensions)) {
    $err = "<div class='alert alert-danger'>Invalid file format. Please select a valid image file.</div>";
    // Handle the error accordingly
  } else {
    // Specify the directory to which the file will be uploaded
    $upload_dir = "dist/img/";

    // Generate a unique file name
    $new_file_name = uniqid() . '.' . $file_extension;

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
      // File uploaded successfully, you can now store the file name in the database
      // Add the file name to your INSERT query or update the existing query to include the profile_pic column
      $query = "INSERT INTO f_clients (fname, lname, email, gender, password, c_password, code, date, expires, profile_pic) VALUES (?,?,?,?,?,?,?,?,?,?)";
    } else {
      $err = "<div class='alert alert-danger'>Failed to upload the file. Please try again.</div>";
      // Handle the error accordingly
    }
  }
}
 
  
}

?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- CSRF Token -->

<link rel="icon" href="../assets/dist/img/court.jpg" type="img/x-icon">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="./dist/css/adminlte.min.css">
<link rel="stylesheet" href="./assets/dist/css/app.css">
<link rel="stylesheet" href="./code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!--font Awesome v4-->

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body class ="bg-light hold-transition sidebar-mini" style="background-image: url('../assets/dist/img/BG/img2.avif');">
  <nav class = "navbar navbar-expand-md navbar-dark fixed-top pt-0 pb-0" id = "navbar_index_login" style ="background-color:#191970;">
    <a class = "navbar-brand" id = "navbar-brand-index" href="#">
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
           <a class = "nav-link" href="login">Login</a>
         </li>

         <li class = "nav-item">
           <a class = "nav-link" href="./register">Sign Up</a>
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
<div class="card-header bg-success text-center text-dark fw-bold fs-6" id = "navbar-brand">Sign Up as client on FMTAF</div>

<div class="card-body bg-dark">
<div class = "row mb-3">
<div class="flex-column text-center">
<img class="img-fluid img-circle" src="assets/dist/img/forex7.png" alt="Fleet Management" height="" width="110">
</div>
</div>
<?php 
    echo $success;
    echo $err;
  ?>
<form method="POST" action="register" enctype="multipart/form-data">
<div class="row">
<div class="col-lg-6">
  <!-- text input -->
  <div class="form-group form-style">
    <label for ="fname" class = "col-form-label text-md-end text-sm">First Name</label>
    <div class="input-group">
      <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
    <input type="text" class="form-control form-control-sm" placeholder="FirstName" name ="fname">
    </div>

  </div>
  </div>
   <div class="col-lg-6">
  <!-- text input -->
  <div class="form-group form-style">
    <label for = "lname" class = "col-form-label text-md-end text-sm">Last Name</label>
    <div class="input-group">
      <span class="input-group-text"><i class="fa fa-address-book" aria-hidden="true"></i></span>
    <input type="text" class="form-control form-control-sm" placeholder="FirstName" name = "lname">
    </div>

</div>
</div>
</div>

<div class="row mb-3">
  <div class ="col-lg-12">
  <div class="form-group form-style">
      <label for="email" class="col-form-label text-md-end text-sm">Email Address</label>
      <div class = "input-group">
      <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
      <input id="email" type="email" class="form-control form-control-sm" name="email"  placeholder = "first.second@mglsd.ac.ug">
  </div>

  </div>
</div>
</div>

<div class="row mb-3">
  <div class="col-lg-12">
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
</div>

<div class="row mb-3">
  <div class="col-lg-12">
  <div class="form-group form-style">
      <label for="password_confirm" class="col-form-label text-md-end text-sm">Profile Picture</label>
      <div class = "input-group">
      <input type="file" id="profile_pic" name="profile_pic" accept="image/*">
     </div>
  </div>
</div>

<div class="row mb-3">
  <div class="col-lg-12">
  <div class="form-group form-style">
      <label for="password" class="col-form-label text-md-end text-sm">Password</label>
      <div class = "input-group">
          <span class="input-group-text"> <i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
      <input id="password" type="password" class="form-control form-control-sm" name="password" autocomplete="new-password" placeholder = "insert password">
  </div>

  </div>
</div>
</div>

<div class="row mb-3">
  <div class="col-lg-12">
  <div class="form-group form-style">
      <label for="password_confirm" class="col-form-label text-md-end text-sm">Confirm Password</label>
      <div class = "input-group">
          <span class="input-group-text"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
      <input id="c_password" type="password" class="form-control form-control-sm" name="c_password" autocomplete="new-password" placeholder = "Comfirm password">
     </div>

  </div>
</div>

<div class="row mb-3">
<div class=" col-md-12 form-group">
  <label for="exampleInputPassword1" hidden>Account Category Code</label>
  <?php
  //PHP function to generate random passenger number
  $_Number =  rand(1000, 9999);
  ?>
  <input type="text" readonly name="code" value="<?php echo $_Number; ?>" class="form-control" id="exampleInputPassword1" hidden>
</div>
</div>
</div>

<div class="row mb-0">
  <div class="col-lg-12">
  <div class="offset-md-0">
  <button type="submit" class="btn btn-danger btn-block btn-sm" name = "create_account">Create Account</button>
  </div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- <footer class="footer bg-white text-lg-start mt-5">
  Copyright
  <div class="p-3">
  <strong>&copy; <a href="https://mglsd.go.ug">FMTAF</a>.</strong>
  <div class="float-right d-none d-sm-inline text-success">
    <b id = "wrapper">FMTAF</b> Version
  </div>
  Copyright
</footer> -->

<script>
ClassicEditor
.create( document.querySelector( '#editor' ) )
.catch( error => {
console.error( error );
} );
</script>
<script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
<!-- Bootstrap -->
<!-- AdminLTE App -->
<script type="text/javascript">
var select_box_element = document.querySelector('#select_box');
 dselect(select_box_element, {
   search: true
 });

</script>

</body>
</html>
