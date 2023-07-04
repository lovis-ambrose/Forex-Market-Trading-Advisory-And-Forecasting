<!DOCTYPE html>
<?php
include('inc/db.php');
$ret = "SELECT * FROM `f_systemsettings` ";
$stmt = $conn->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($sys = $res->fetch_object()) {
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="icon" href="/assets/dist/img/forex1.jpg" type="img/x-icon">
    <title><?php echo $sys->sys_name;?></title>
    <link href="dist/css/robust.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

   <link rel="stylesheet" href="assets/dist/css/animate.css">
   <link rel="stylesheet" href="assets/dist/css/app.css">
   



    <!-- Font Awesome Icons -->


</head>
<body data-bs-spy="scroll" onload="myFunction()" id = "index_body">

<!--Start of a home section-->
  <div id="home" class="parallax foo">
    <div class="">
      <nav class = "navbar navbar-expand-md navbar-dark fixed-top pt-0 pb-0 mb-0" id = "navbar_index_login" style ="background-color:#191970;">
      <a class = "navbar-brand" id = "navbar-brand-index" href="#">
      <img class="img-fluid img-responsive" src="assets/dist/img/forex7.png" alt="Fleet Management"
      height="" width="40" style ="border-radius:40%;"><span class = "text-white parag">FMTAF</span>
    </a>

        <button type="button" class = "navbar-toggler pt-0 pb-0" data-bs-toggle = "collapse" data-bs-target = "#navbarResponsive"
         aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           <span class = "navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id = "navbarResponsive">
           <ul class = "navbar-nav ms-auto mb-1 mb-lg-0" id = "navbar-nav">
             <li class = "nav-item">
               <a class = "nav-link" href="./index">Home</a>
             </li>

             <li class = "nav-item">
               <a class = "nav-link" href="./clients/login">Dashboard</a>
             </li>

             <li class = "nav-item">
               <a class = "nav-link" href="./clients/login">Contact us</a>
             </li>

             <li class = "nav-item">
               <a class = "nav-link" href="./clients/login">About us</a>
             </li>

           </ul>
        </div>
      </nav>
    </div>


    <!---Start of the image slid---->
    <div class ="container-fluid d-flex justify-content-center mt-5" id ="">
      <div class ="text-center text-white w-100" style ="background-color:transparent;">
        <div class="hero-text" style=" text-align: center; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
          <h2 class="animated rubberBand fw-bolder display-6"><?php echo  $sys->sys_tagline; ?></h2>
          <p class ="lead fw-normal text-white-50 mb-0"><?php echo $sys->f_desc;?></p>
          <a class="btn btn-primary" style="text-align: center" href="./clients/login">Login</a>
          <a class="btn btn-primary" style="text-align: center" href="./clients/register">Create an Account</a>
        </div>
      </div>
    </div>
  </div>

      <div>
         <br><br>
          <div id="bus_route" class="container">
            <div class="page-header">
              <h1 style="text-align: center">The Future Begins Here</h1>
            </div>
            <div class="row">
              
                <div class="col-lg-6 col-md-12 foo">
                  <p class ="text-responsive fw-bold" style ="color:red;"><marquee behavior="scroll" scrollamount="10">Check out the Market trends...Predict and win awesomely</marquee></hp>
                  <img src="assets/dist/img/forex4.jpg" class="img-fluid img-responsive w-100">
                </div>
                <div class="col-lg-6 col-md-12" style="height:50%;">
                    <br>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/dist/img/forex5.jpg" alt="First slide" height="340">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/dist/img/forex6.jpg" alt="Second slide" height="340">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/dist/img/forex3.jpg" alt="Third slide" height="340">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<p>Market Trends</p>

                </div>
            </div>
          </div>

          <br>

            <p></p>
          </div>
          <footer class="bg-dark text-center text-lg-start pt-4 pb-4">
    <!-- Copyright -->
    <div class="text-center p-3" style="color:white;">
      <p class="m-0 text-center text-white">Copyright &copy; BSE23-7</p>
     </div>
    <!-- Copyright -->
  </footer>
<?php
  }
?>
<!--Start of a home section-->


<script>
    $(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-fixed-top");
    $a= $(".parallax");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $a.height());
  });
});

    </script>



  <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>


  <script>
        window.sr = ScrollReveal();
        sr.reveal('.foo', { duration: 800 });
        sr.reveal('.foo1', { duration: 800,origin: 'top'});
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
    <!-- <script src="assets/dist/js/adminlte.js"></script>
    <script src="assets/dist/js/ministry.js"></script> -->
    <script src="dist/js/bundle.js"></script>
  </body>
</html>
