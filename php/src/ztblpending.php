<?php 
require('session.php');
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pending Barrow Request</title>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->  
    <?php include("zmenu.php") ?>
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
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
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
<h1 class="h3 mb-0 text-gray-900" style="font-weight: bold;">Pending Laboratory Request</h1>
<form action="ztblpending.php" method="post">
  
 
  <table  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 5px 15px 0 rgba(0, 0, 0, 0.4);">
    <tr>
        <th>Lab Image</th>
        <th>Lab Name</th>
        <th>Lab Description</th>
        <th>Lab Admin</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Status</th>
        <th>Action</th>
  </tr>
  <?php
$query = 'SELECT * FROM tblacc
              WHERE status="pending"';
            $result = mysqli_query($con,$query) or die(mysqli_error($con));
              while($row = mysqli_fetch_array($result))
              {   
                  $id = $row['id'];
                  $fname = $row['fname'];
                  $lname = $row['lname'];
                  $email = $row['email'];
                  $user_type = $row['user_type'];
                  $contact = $row['contact'];
                  $status = $row['status'];

          $querys = 'SELECT * FROM tbllab
              WHERE
              admin_id ='.$id;
            $results = mysqli_query($con,$querys) or die(mysqli_error($con));
              while($row = mysqli_fetch_array($results))
              {   
                $admin_id = $row['admin_id'];
                $lab_name = $row['lab_name'];
                $lab_description = $row['lab_description'];
                $image = $row['image'];
              ?>
              <tr>
                <td><img class="img_item" src="<?php echo $image ?>"></td>
                <td><?php echo $lab_name ?></td>
                <td><?php echo $lab_description ?></td>
                <td><?php echo $fname.' '.$lname ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $contact ?></td>
                <td><?php echo $status ?></td>
                <td>
                  <a class='btn btn-primary' href='query/confirmed_lab_process.php?action=editlab & rn=<?php echo $id ?>'>confirm
                  </a>
                </td>
              </tr>
              <?php
               
    }
}

?>
   

</table>
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
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
