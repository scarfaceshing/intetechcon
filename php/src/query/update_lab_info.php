<?php
require('../dbcon/dbconnection.php');
if (isset($_POST['save_btn'])) 
{
      $admin_id = $_POST['admin_id'];
      $lab_name = $_POST['lab_name'];
      $lab_description = $_POST['lab_description'];


       $query = "UPDATE `laboratorydb`.`tbllab` SET `lab_name`='$lab_name', `lab_description`='$lab_description' WHERE  `admin_id`=$admin_id ";
          $result = mysqli_query($con,$query) or die(mysqli_error($con));

        if ($result) {
            ?>    <script type="text/javascript">
                           alert("Successfully Updated");
                          window.location = "../tbllab.php";
                      </script>
                 <?php   
        }else{
            ?>    <script type="text/javascript">
                           alert("Error");
                          window.location = "../tbllab.php";
                      </script>
          <?php  
        }
}
?>  