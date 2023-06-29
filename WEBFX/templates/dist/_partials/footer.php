<?php
/* Persisit System Settings On Brand */
$ret = "SELECT * FROM `f_SystemSettings` ";
$stmt = $conn->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($sys = $res->fetch_object()) {
?>
  <footer class="main-footer">
    <strong>&copy; 2020-<?php echo date('Y'); ?> - Crafted with 💘 by BSSE-7.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.0
    </div>
  </footer>
<?php } ?>