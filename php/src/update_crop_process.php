<?php
require('dbcon/dbconnection.php');
if (isset($_POST['insert_btn'])) 
{

  $id = $_POST['id'];

  $farmer_id = $_POST['farmer_id'];
  $farmer_name = $_POST['farmer_name'];
  $brgy = $_POST['brgy'];
  $income = $_POST['income'];
  $day = $_POST['day'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $gain_loss = $_POST['gain_loss'];
  $feedback = $_POST['feedback'];


    $query = "UPDATE `tblcrop` SET 
    `income`='$income', 
    `day`='$day', 
    `month`='$month', 
    `year`='$year', 
    `gain_loss`='$gain_loss', 
    `feedback`='$feedback'
    WHERE  `id`=$id;";

        if (mysqli_query($con, $query)) {
              ?>   
              <script type="text/javascript">
                alert("Crop Successfully Updated");
                window.location = "index.php";
              </script>
              <?php 
        } else {
             ?>   
              <script type="text/javascript">
                alert("ERROR UPDATE!");
                window.location = "index.php";
              </script>
              <?php 

        }
}
?>