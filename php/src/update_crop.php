<?php 
require('session.php');
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADD CROP</title>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->  
    <?php include("menu.php") ?>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['FIRST_NAME'].' '.$_SESSION['LAST_NAME'] ;?></span>
                <i class="fa fa-user"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
<?php
$ids = $_GET['rn'];
 $sql = "SELECT * from tblcrop where id=$ids ";
 $result = $con-> query($sql);
 if ($result-> num_rows > 0) {
    while($row = $result-> fetch_assoc()){
          $id  = $row["id"];
          $farmer_id  = $row["farmer_id"];
          $farmer_name  = $row["farmer_name"];
          $brgy  = $row["brgy"];
          $income  = $row["income"];
          $day  = $row["day"];
          $month  = $row["month"];
          $year  = $row["year"];
          $gain_loss  = $row["gain_loss"];
          $feedback  = $row["feedback"];
}}
?>
<center>
<form action="update_crop_process.php" method="post" enctype="multipart/form-data">
  <div id="container">
    <h2>UPDATE FARMER CROP</h2>
      <input type="hidden" name="id" value="<?php echo $ids ?>">
      <input type="hidden" name="farmer_id" value="<?php echo $farmer_id ?>">
      <input type="hidden" name="brgy" value="<?php echo $brgy ?>">
      <div>
        <input class="inputs" type="hidden" name="farmer_name" required="" value="<?php echo $farmer_name; ?>">
        <div style="text-align: left;"> 
          <label class="inputs">Farmer name: <b><?php echo $farmer_name; ?></b></label>
        </div>
      </div>
      <div>
        <input value="<?php echo $income ?>" class="inputs" type="number" name="income" min="0" placeholder="Crop Gain/Loss" required="">
      </div>
      <div>
        <input value="<?php echo $day ?>" class="inputs" type="number" name="day" min="1" max="32" placeholder="Day" required="">
      </div>
      <div>
        <select class="inputs" name="month">
          <option><?php echo $month ?></option>
          <option>January</option>
          <option>February</option>
          <option>March</option>
          <option>April</option>
          <option>May</option>
          <option>June</option>
          <option>July</option>
          <option>August</option>
          <option>September</option>
          <option>October</option>
          <option>November</option>
          <option>December</option>
        </select>
      </div>
      <div>
        <input value="<?php echo $year ?>" class="inputs" type="number" name="year" min="0" placeholder="Year" required="">
      </div>
      <div>
        <select class="inputs" required="" name="gain_loss">
          <option><?php echo $gain_loss ?></option>
          <option>Gain</option>
          <option>Loss</option>
        </select>
      </div>
      <div>
        <textarea class="inputs" required="" rows="3" placeholder="Your crop comment" name="feedback"><?php echo $feedback ?></textarea>
      </div>


  <input name="insert_btn" class="btn btn-primary" id="save_btn" type="submit" value="UPDATE"/>
   <a class="btn btn-danger" href="index.php">CANCEL</a>
   </div>
</form>
</center>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer> -->
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log out?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Do you really want to log out?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="logout.php">Yes</a>
        </div>
      </div>
    </div>
  </div>

 <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="admin/js/sb-admin-2.min.js"></script>
  <script src="admin/vendor/chart.js/Chart.min.js"></script>
  <script src="admin/js/demo/chart-area-demo.js"></script>
  <script src="admin/js/demo/chart-pie-demo.js"></script>


</body>
</html>
