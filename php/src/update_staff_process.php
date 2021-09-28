<?php
require('dbcon/dbconnection.php');
if (isset($_POST['update_stafff_btn'])) 
{

  $id = $_POST['id'];

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $sto_strt = $_POST['sto_strt'];
  $brgy = $_POST['brgy'];
  $brgy_destination = $_POST['brgy_destination'];


    $query = "UPDATE `tblacc` SET 
    `fname`='$fname', 
    `lname`='$lname', 
    `contact`='$contact', 
    `email`='$email', 
    `sex`='$sex', 
    `age`='$age', 
    `sto_strt`='$sto_strt', 
    `brgy`='$brgy', 
    `brgy_destination`='$brgy_destination'
    WHERE  `id`=$id;";

        if (mysqli_query($con, $query)) {
              ?>   
              <script type="text/javascript">
                alert("Staff Successfully Updated");
                window.location = "tblstaff.php";
              </script>
              <?php 
        } else {
             ?>   
              <script type="text/javascript">
                alert("ERROR UPDATE!");
                window.location = "tblstaff.php";
              </script>
              <?php 

        }
}
?>