<?php
 if(preg_match('#/test.php#', $_SERVER['REQUEST_URI'])){
   header("Location:../user/");
 }
 ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
    crossorigin="anonymous">
    <meta charset="utf-8">
    <div class="container clearfix">

    <div class="">
      <h5 class="lead">This is a login page</h5>

      <form class="border-1" action="index.html" method="post">
        <div class="form-group">
          <label for="form-label">First Name</label>
          <input type="text" name="" value="" class ="form-control">
        </div>

        <div class="form-group">
          <label for="form-label">Second Na</label>
          <input type="text" name="" value="" class ="form-control">
        </div>

        <div class="form-group">
          <label for="form-label">Password</label>
          <input type="password" name="" value="" class ="form-control">
        </div>
      </form>
    </div>
      </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
   <?php include('../footer.php'); ?>


   <defaultDocument enabled="true">
            <files>
                <remove value="Default.htm" />
                <add value="Default.htm" />
            </files>
        </defaultDocument>
