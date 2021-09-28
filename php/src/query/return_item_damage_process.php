<?php
require('../dbcon/dbconnection.php');

    $id = $_GET['rn'];
    $item_id = $_GET['item_id'];
    $quantity_damage = $_GET['quantity_damage'];
                
                

      date_default_timezone_set('Asia/Manila');
      $date_return = date('F d, Y h:i:s a');

       $query = "UPDATE `laboratorydb`.`tblitemdamage` SET 
       `status`='returned', 
       `date_damage_return`='$date_return' 
       WHERE  `id`=$id ";
          $result = mysqli_query($con,$query) or die(mysqli_error($con));

        if ($result) {
            $querys = "UPDATE tblitems set quantity= quantity + $quantity_damage where item_id='$item_id' ";
            mysqli_query($con,$querys);


            ?>    <script type="text/javascript">
                           alert("Damaged Item Succesfully Returned");
                          window.location = "../tbldamage.php";
                      </script>
                 <?php
            
        }else{
            ?>    <script type="text/javascript">
                           alert("Error");
                          window.location = "../tbldamage.php";
                      </script>
          <?php  
      }
?>  