<?php
require('../dbcon/dbconnection.php');
if (isset($_POST['damage_btn'])) 
{
     

                
                $no_item_damage = $_POST['no_item_damage'];

                $id= $_POST['id'];
                $lab_id= $_POST['lab_id'];
                $item_id= $_POST['item_id'];
                $fname= $_POST['fname'];
                $lname= $_POST['lname'];
                $contact= $_POST['contact'];
                $course= $_POST['course'];
                $yr= $_POST['yr'];
                $sec= $_POST['sec'];
                $id_img= $_POST['id_img'];
                $barrow_quantity= $_POST['barrow_quantity'];
                $item_barrow= $_POST['item_barrow'];

                $item_ok = $barrow_quantity - $no_item_damage;

                $name = $fname.' '.$lname;
                $course_yr_sec = $course.' '.$yr.' - '.$sec;

      date_default_timezone_set('Asia/Manila');
      $date_return = date('F d, Y h:i:s a');

       $query = "UPDATE `laboratorydb`.`tblbarrower` SET 
       `status`='returned', 
       `date_return`='$date_return' 
       WHERE  `id`=$id ";
          $result = mysqli_query($con,$query) or die(mysqli_error($con));

        if ($result) {
            $querys = "UPDATE tblitems set quantity= quantity + $item_ok where item_id='$item_id' ";
            mysqli_query($con,$querys);

            $insert_tbldamage = "INSERT INTO `laboratorydb`.`tblitemdamage` (
            `lab_id`, 
            `item_id`, 
            `id_img`, 
            `name`, 
            `contact`, 
            `course_yr_sec`, 
            `item_name`, 
            `quantity_damage`, 
            `date_damage`) 
            VALUES (
            '$lab_id',
            '$item_id',
            '$id_img', 
            '$name', 
            '$contact', 
            '$course_yr_sec', 
            '$item_barrow', 
            '$no_item_damage', 
            '$date_return');";
            mysqli_query($con,$insert_tbldamage);

            ?>    <script type="text/javascript">
                           alert("Damaged Item Succesfully Submit");
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
}
?>  