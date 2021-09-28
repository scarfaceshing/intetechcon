<?php
require('../dbcon/dbconnection.php');

      $id = $_GET['rn'];
      date_default_timezone_set('Asia/Manila');
      $date_barrow = date('F d, Y h:i:s a');
       $query = "UPDATE `laboratorydb`.`tblbarrower` SET 
       `status`='barrowed', 
       `date_barrow`='$date_barrow' 
       WHERE  `id`=$id ";
          $result = mysqli_query($con,$query) or die(mysqli_error($con));

        if ($result) {
            ?>    <script type="text/javascript">
                           alert("Request Successfully Confirmed");
                          window.location = "../index.php";
                      </script>
                 <?php   
        }else{
            ?>    <script type="text/javascript">
                           alert("Error");
                          window.location = "../index.php";
                      </script>
          <?php  
      }
?>  