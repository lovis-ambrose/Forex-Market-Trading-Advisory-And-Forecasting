<?php
/* Persisit System Settings On Brand */
$ret = "SELECT * FROM `f_SystemSettings` ";
$stmt = $conn->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($sys = $res->fetch_object()) {
?>
  <footer class="main-footer">
    <strong style="margin-left: 300px;">&copy; <?php echo Date('D, M, Y'); ?> FMTAF.com. All rights reserved.</strong>
    <p>
    Disclaimer: FMTAF is not accountable for any trading losses incurred. Please combine our forecasts with other trading techniques and exercise caution when making investment decisions.
    </p>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
<?php } ?>