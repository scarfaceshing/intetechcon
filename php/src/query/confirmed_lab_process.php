<?php
require('../dbcon/dbconnection.php');

      $id = $_GET['rn'];

       $query = "UPDATE `laboratorydb`.`tblacc` SET `status`='confirm'
                 WHERE  `id`=$id ";
          $result = mysqli_query($con,$query) or die(mysqli_error($con));

        if ($result) {
          $querys = "UPDATE `laboratorydb`.`tbllab` SET `status`='confirm'
                 WHERE  `admin_id`=$id ";
          mysqli_query($con,$querys);

            ?>    <script type="text/javascript">
                           alert("Laboratory Successfully Confirmed");
                          window.location = "../ztblpending.php";
                      </script>
                 <?php   
        }else{
            ?>    <script type="text/javascript">
                           alert("Error");
                          window.location = "../ztblpending.php";
                      </script>
          <?php  
        }
?>  