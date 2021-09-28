<?php
 require('../dbcon/dbconnection.php');
if (isset($_POST['btn_submit_lab'])) 
{
 $target="img/".basename($_FILES['image']['name']);
  
  //$image = $_FILES['image']['name'];
  $filename = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $folder = $filename;
  echo $folder;
  move_uploaded_file($tmp_name, $folder);


  $admin_id = $_POST['admin_id'];
  $lab_name = $_POST['lab_name'];
  $lab_description = $_POST['lab_description'];

    $query = "INSERT INTO tbllab(admin_id,lab_name,lab_description,img) 
    VALUES ('$admin_id','$lab_name','$lab_description','$folder')";
        if (mysqli_query($con, $query)) { 
              ?>
                <script type="text/javascript">
                  alert("Laboratory Successfully Created");
                 // window.location = "../add_lab.php";
                </script>
              <?php
        } else {
             ?>
                <script type="text/javascript">
                  alert("ERROR!");
                  window.location = "../add_lab.php";
                </script>
              <?php
        }
}
?>