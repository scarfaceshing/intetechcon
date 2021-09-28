<?php
require('dbcon/dbconnection.php');
if (isset($_POST['btb_save'])) 
{

  $id = $_POST['id'];

  $announce = $_POST['announce'];


    $query = "UPDATE `tblannounce` SET 
    `announce`='$announce'
    WHERE  `id`=$id;";

        if (mysqli_query($con, $query)) {
              ?>   
              <script type="text/javascript">
                alert("Announement Successfully Updated");
                window.location = "zindex.php";
              </script>
              <?php 
        } else {
             ?>   
              <script type="text/javascript">
                alert("ERROR UPDATE!");
                window.location = "zindex.php";
              </script>
              <?php 

        }
}
?>