<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo 
    and load this 
    page with logged in user instance
    -->
  <?php
  $f_id = $_SESSION['f_id'];
  $ret = "SELECT * FROM  f_clients WHERE f_id = ? ";
  $stmt = $conn->prepare($ret);
  $stmt->bind_param('i', $f_id);
  $stmt->execute(); //ok
  $res = $stmt->get_result();
  while ($row = $res->fetch_object()) {
    //set automatically logged in user default image if they have not updated their pics
    if ($row->profile_pic == '') {
      $profile_picture = "<img src='dist/img/user_icon.png' class='img-circle elevation-2' alt='User Image'>
                ";
    } else {
      $profile_picture = "<img src='dist/img/$row->profile_pic' class='img-circle elevation-2' alt='User Image'>
                ";
    }

    /* Persisit System Settings On Brand */
    $ret = "SELECT * FROM `f_SystemSettings` ";
    $stmt = $conn->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($sys = $res->fetch_object()) {
  ?>


      <a href="pages_dashboard.php" class="brand-link">
        <img src="dist/img/bank.png" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold text-info"><?php echo $sys->sys_name; ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <?php echo $profile_picture; ?>
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $row->lname; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item has-treeview">
              <a href="pages_dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <!-- ./DAshboard -->

            <!--Account -->
            <li class="nav-item">
              <a href="contact_us.php" class="nav-link">
                <i class="nav-icon fas fa-user-secret"></i>
                <p>
                  Contact Us
                </p>
              </a>
            </li>
            <!-- ./Account-->

            

            <!--Password Resets-->
            <li class="nav-item">
              <a href="about_us.php" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  About Us
                </p>
              </a>
            </li>
            <!-- ./ Password Resets-->


            <!-- Log Out -->
            <li class="nav-item">
              <a href="pages_logout" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Log Out
                </p>
              </a>
            </li>
            <!-- ./Log Out -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
</aside>
<?php
    }
  } ?>