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
    $brgys  = $row["brgy"];
    $brgy_destination_staff  = $row["brgy_destination"];
    $status  = $row["status"];
    $user_type  = $row["user_type"];
    }
  }
?>
<?php
/*$con  = mysqli_connect("localhost","root","","dadb");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT brgy,  avg(income) as income from tblcrop where year='2020' group by brgy;";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $brgy[]  = $row['brgy'];
            $income[] = $row['income'];
        }
 
 
 }
 
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Barangay Average Crop Productivity</title>
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
  <div style="padding: 30px">
    <h2 class="page-header" >Average per Barangay Crop Productivity </h2>

<form action="zcrop_brgy.php" method="post">
  <a href="zcrop_brgy.php" class="btn btn-success" style="margin-right: 5px">Over All</a>
       </a>
<label style="color: black;font-size: 20px;padding: ">Search Year: </label> 
<select name="search" style="height: 35px;width: 80px;border-radius: 5px;padding: 3px">
        <?php

  $sql = "SELECT year from tblcrop group by year order by year desc";
  $result = $con-> query($sql);
if ($result-> num_rows > 0) {
  while($row = $result-> fetch_assoc()){
        $year  = $row["year"]; 
      ?>       
         <option><?php echo $year; ?></option>
       <?php
}}
      ?>
</select>
<input type="submit" name="" class="btn btn-primary">

  </div>
        


<?php
$output = '';
if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
  $query = mysqli_query($con, "SELECT brgy,  avg(income) as income from tblcrop where year=$searchq group by brgy;");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    echo '<script type="text/javascript"> alert("Search not found!") </script>';  
     $sql = "SELECT brgy,  avg(income) as income from tblcrop where year=$searchq group by brgy;";

$result = $con-> query($sql);

if ($result-> num_rows > 0) {

  while($row = $result-> fetch_assoc()){
        $brgy[]  = $row['brgy'];
        $income[] = $row['income'];

?>
        <div style="width:90%;height:20%;text-align:center">
            <canvas  id="chartjs_bar"></canvas> 
        </div> 
<?php
}
}
  }else{
    while($row = mysqli_fetch_array($query)){
        $brgy[]  = $row['brgy'];
        $income[] = $row['income'];

?>
        <div style="width:90%;height:20%;text-align:center">
            <canvas  id="chartjs_bar"></canvas> 
            
        </div>
        
<?php
    }
  }
}else{
  $sql = "SELECT brgy,  avg(income) as income from tblcrop group by brgy;" ;
$result = $con-> query($sql);
if ($result-> num_rows > 0) {
  while($row = $result-> fetch_assoc()){
        $brgy[]  = $row['brgy'];
        $income[] = $row['income'];

?>
        <div style="width:90%;height:20%;text-align:center">
            <canvas  id="chartjs_bar"></canvas> 

        </div> 
<?php

}
}
}
?>


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

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($brgy); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($income); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: '',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 15,
                        }
                    },
 
 
                }
                });
    </script>

</body>
</html>
