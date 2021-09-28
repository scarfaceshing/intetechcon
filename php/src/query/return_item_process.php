<?php
require('../dbcon/dbconnection.php');

      $id = $_GET['rn'];
      $item_id = $_GET['item_id'];
      $barrow_quantity = $_GET['barrow_quantity'];

      date_default_timezone_set('Asia/Manila');
      $date_return = date('F d, Y h:i:s a');
       $query = "UPDATE `laboratorydb`.`tblbarrower` SET 
       `status`='returned', 
       `date_return`='$date_return' 
       WHERE  `id`=$id ";
          $result = mysqli_query($con,$query) or die(mysqli_error($con));

        if ($result) {
           $querys = "UPDATE tblitems set quantity= quantity + $barrow_quantity where item_id='$item_id' ";
             mysqli_query($con,$querys);
            ?>    <script type="text/javascript">
                           alert("Item Successfully Returned");
                          window.location = "../tblbarrowed.php";
                      </script>
                 <?php   
        }else{
            ?>    <script type="text/javascript">
                           alert("Error");
                          window.location = "../tblbarrowed.php";
                      </script>
          <?php  
      }
?>  