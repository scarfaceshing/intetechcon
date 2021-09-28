<?php 
require('session.php');
include('header.php');

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

<center>
<form action="add_farmer.php" method="post" enctype="multipart/form-data">
  <div id="container">
    <h2>ADD NEW FARMER</h2>
      <div>
        <input class="inputs" type="text" name="fname" placeholder="First name" required="">
      </div>
      <div>
        <input class="inputs" type="text" name="lname" placeholder="Last name" required="">
      </div>
      <div>
        <input class="inputs" type="number" name="contact" placeholder="Contact no. (ex. 09..)" required="">
      </div>
      <div>
        <input class="inputs" type="email" name="email" placeholder="Email" required="">
      </div>
      <div style="text-align: left;">Sex:
        <select style="padding: 3px;margin-bottom: 15px;margin-right: 50px" name="sex">
          <option>Male</option>
          <option>Female</option>
        </select>
        Age: <input type="number" min="18" name="age">
      </div>
      <div>
        <input class="inputs" type="text" name="sto_street" required="" placeholder="Sitio/Street">
      </div>
      <div style="text-align: left;">Barangay:
        <select class="inputs" required="" name="brgy">
          <option>ABACA</option>
          <option>BACLAO</option>
          <option>BASAK</option>
          <option>BULATA</option>
          <option>CALILING</option>
          <option>CAMALANDAAN</option>
          <option>CAMINDANGAN</option>
          <option>ELIHAN</option>
          <option>GUILUNGAN</option>
          <option>INAYAWAN</option>
          <option>ISIO</option>
          <option>LINAON</option>
          <option>LUMBIA</option>
          <option>MAMBUGSAY</option>
          <option>MAMBUGSAY</option>
          <option>MAN-ULING</option>
          <option>MASALING</option>
          <option>MOLOBOLO</option>
          <option>POBLACION</option>
          <option>SURA</option>
          <option>TALACDAN</option>
          <option>TAMBAD</option>
          <option>TILING</option>
          <option>TOMINA</option>
          <option>TUYOM</option>
          <option>YAOYAO</option>

        </select>
      </div>
      

  <input name="insert_btn" class="btn btn-primary" id="save_btn" type="submit" value="ADD"/>
   <button type="reset" class="btn btn-danger" id="reset_btn">RESET</button>
   </div>
</form>
</center>
<?php
if (isset($_POST['insert_btn'])) 
{
  

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $sto_street = $_POST['sto_street'];
  $brgy = $_POST['brgy'];

    $query = "INSERT INTO `tblfarmer` (`fname`, `lname`, `contact`, `email`, `sex`, `age`, `sto_street`, `brgy`) 
    VALUES ('$fname', '$lname', '$contact', '$email', '$sex', '$age', '$sto_street', '$brgy');";
        if (mysqli_query($con, $query)) {
              ?>   
              <script type="text/javascript">
                alert("New Farmer Successfully Added");
                window.location = "add_farmer.php";
              </script>
              <?php 
        } else {
             ?>   
              <script type="text/javascript">
                alert("ERROR!");
                window.location = "add_farmer.php";
              </script>
              <?php 

        }
}
?>

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
