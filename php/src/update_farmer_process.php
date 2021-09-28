<?php
require('dbcon/dbconnection.php');
if (isset($_POST['update_btn'])) 
{

  $id = $_POST['id'];

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $sto_street = $_POST['sto_street'];
  $brgy = $_POST['brgy'];


    $query = "UPDATE `tblfarmer` SET 
    `fname`='$fname', 
    `lname`='$lname', 
    `contact`='$contact', 
    `email`='$email', 
    `sex`='$sex', 
    `age`='$age', 
    `sto_street`='$sto_street', 
    `brgy`='$brgy'
    WHERE  `id`=$id;";

        if (mysqli_query($con, $query)) {
              ?>   
              <script type="text/javascript">
                alert("Farmer Data Successfully Updated");
                window.location = "tblfarmer.php";
              </script>
              <?php 
        } else {
             ?>   
              <script type="text/javascript">
                alert("ERROR UPDATE!");
                window.location = "tblfarmer.php";
              </script>
              <?php 

        }
}
?>