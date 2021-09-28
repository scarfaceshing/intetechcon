<?php
require('dbcon/dbconnection.php');
if (isset($_POST['insert_btn'])) 
{

  $farmer_id = $_POST['farmer_id'];
  $farmer_name = $_POST['farmer_name'];
  $clasirice = $_POST['clasirice'];
  $variety = $_POST['variety'];
  $watersource = $_POST['watersource'];
  $yield = $_POST['yield'];
  $brgy = $_POST['brgy'];
  $income = $_POST['income'];
  $day = $_POST['day'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $gain_loss = $_POST['gain_loss'];
  $feedback = $_POST['feedback'];

    $query = "INSERT INTO `tblcrop` (`farmer_id`, `farmer_name`, `clasirice`, `variety`, `watersource`, `yield`, `brgy`, `income`, `day`, `month`, `year`, `gain_loss`, `feedback`) 
    VALUES ('$farmer_id', '$farmer_name', '$clasirice', '$variety', '$watersource', '$yield', '$brgy', '$income', '$day', '$month', '$year', '$gain_loss', '$feedback');";
        if (mysqli_query($con, $query)) {
              ?>   
              <script type="text/javascript">
                alert("Crop Successfully Added");
                window.location = "tblfarmer.php";
              </script>
              <?php 
        } else {
             ?>   
              <script type="text/javascript">
                alert("ERROR!");
                window.location = "tblfarmer.php";
              </script>
              <?php 

        }
}
?>