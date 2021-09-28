<?php 
require('session.php');
include('header.php');
$sql = "SELECT * FROM tblacc where id=".$_SESSION['MEMBER_ID'];
$result = $con-> query($sql);
if ($result-> num_rows > 0) {
  while($row = $result-> fetch_assoc()){
    $id  = $row["id"];
    $fname  = $row["fname"];
    $lname  = $row["lname"];
    $contact  = $row["contact"];
    $email  = $row["email"];
    $id_pic  = $row["id_pic"];
    $sex  = $row["sex"];
    $age  = $row["age"];
    $sto_strt  = $row["sto_strt"];
    $brgy  = $row["brgy"];
    $brgy_destination_staff  = $row["brgy_destination"];
    $status  = $row["status"];
    $user_type  = $row["user_type"];
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Farmer Data</title>
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
         
<div class="col-md-12">
 <h1 class="h3 mb-0 text-gray-900" style="font-weight: bold; padding: 10px">FARMER TABLE</h1>
</div>


<form action="tblfarmer.php" method="post" style="margin-bottom: 50px">
  <a href="tblfarmer.php" class="Refresh">Refresh</a>
  <input class="sear" type="text" name="search" placeholder="Search . . ." >
  <br/>
  <div style="width: 100%;overflow: scroll;height: 500px">
  <table>
  <tr>
    <thead>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Sex</th>
        <th>Age</th>
        <th>Sitio/Sreet</th>
        <th>Barangay</th>
        <th>Button</th>
    </thead>
    <!--tfoot>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Sex</th>
        <th>Age</th>
        <th>Sitio/Sreet</th>
        <th>Barangay</th>
        <th>Button</th>
    </tfoot-->
<?php
require('dbcon/dbconnection.php');
$output = '';
if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
  $query = mysqli_query($con, "SELECT * FROM tblfarmer WHERE brgy='$brgy_destination_staff' and
    fname LIKE '%$searchq%' OR 
    lname LIKE '%$searchq%' OR 
    contact LIKE '%$searchq%' OR
    sto_street LIKE '%$searchq%' 
    ");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    echo '<script type="text/javascript"> alert("Farmer is not in the List!") </script>';  
     $sql = "SELECT * FROM tblfarmer where brgy='$brgy_destination_staff'";
$result = $con-> query($sql);
if ($result-> num_rows > 0) {
  while($row = $result-> fetch_assoc()){
    $id  = $row["id"];
    $fname  = $row["fname"];
    $lname  = $row["lname"];
    $contact  = $row["contact"];
    $email  = $row["email"];
    $sex  = $row["sex"];
    $age  = $row["age"];
    $sto_street  = $row["sto_street"];
    $brgy  = $row["brgy"];
 ?>
  <tr>
    <td style='text-transform: uppercase;'><?php echo $fname.' '.$lname; ?></td>
    <td><?php echo $contact; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $sex; ?></td>
    <td><?php echo $age; ?></td>
    <td><?php echo $sto_street; ?></td>
    <td><?php echo $brgy; ?></td>
    <td>
      <a class="btn btn-warning" href="update_farmer.php?action=update_farmer & rn=<?php echo $id ?>">UPDATE</a>
      <a class="btn btn-primary" href="addcrop.php?action=addcrop & rn=<?php echo $id ?>">+ Crop</a>
    </td>
  </tr>
<?php
}
}
  }else{
    while($row = mysqli_fetch_array($query)){
    $id  = $row["id"];
    $fname  = $row["fname"];
    $lname  = $row["lname"];
    $contact  = $row["contact"];
    $email  = $row["email"];
    $sex  = $row["sex"];
    $age  = $row["age"];
    $sto_street  = $row["sto_street"];
    $brgy  = $row["brgy"];
 ?>
  <tr>
    <td style='text-transform: uppercase;'><?php echo $fname.' '.$lname; ?></td>
    <td><?php echo $contact; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $sex; ?></td>
    <td><?php echo $age; ?></td>
    <td><?php echo $sto_street; ?></td>
    <td><?php echo $brgy; ?></td>
    <td>
      <a class="btn btn-warning" href="update_farmer.php?action=update_farmer & rn=<?php echo $id ?>">UPDATE</a>
      <a class="btn btn-primary" href="addcrop.php?action=addcrop & rn=<?php echo $id ?>">+ Crop</a>
    </td>
  </tr>
<?php
    }
  }
}else{
  $sql = "SELECT * FROM tblfarmer where brgy='$brgy_destination_staff'";
$result = $con-> query($sql);
if ($result-> num_rows > 0) {
  while($row = $result-> fetch_assoc()){
    $id  = $row["id"];
    $fname  = $row["fname"];
    $lname  = $row["lname"];
    $contact  = $row["contact"];
    $email  = $row["email"];
    $sex  = $row["sex"];
    $age  = $row["age"];
    $sto_street  = $row["sto_street"];
    $brgy  = $row["brgy"];
 ?>
  <tr>
    <td style='text-transform: uppercase;'><?php echo $fname.' '.$lname; ?></td>
    <td><?php echo $contact; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $sex; ?></td>
    <td><?php echo $age; ?></td>
    <td><?php echo $sto_street; ?></td>
    <td><?php echo $brgy; ?></td>
    <td>
      <a class="btn btn-warning" href="update_farmer.php?action=update_farmer & rn=<?php echo $id ?>">UPDATE</a>
      <a class="btn btn-primary" href="addcrop.php?action=addcrop & rn=<?php echo $id ?>">+ Crop</a>
    </td>
  </tr>
<?php
    }
  }
}
?>
  </tr>
 
 
  
</table>
</div>
</form>

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
