<?php
require('session.php');
require('dbcon/dbconnection.php');
if (isset($_POST['login'])) {
  $sus=$_POST['us'];
  $spw=$_POST['pw'];
  $query = "SELECT * from tblacc where username='$sus' and pass=md5('$spw') " ;
    $result = mysqli_query($con, $query);
        if ($result){
        $numrows = mysqli_num_rows($result);
            if ($numrows == 1) {
                $found_user  = mysqli_fetch_array($result);
                $_SESSION['MEMBER_ID']  = $found_user['id']; 
                $_SESSION['FIRST_NAME'] = $found_user['fname']; 
                $_SESSION['LAST_NAME']  =  $found_user['lname'];
                $_SESSION['user_type']  =  $found_user['user_type'];
                if ($_SESSION['user_type'] == 'staff') {
                  ?>    <script type="text/javascript">
                           alert("Welcome Staff");
                          window.location = "index.php";
                      </script>
                 <?php   
                }else{
                     ?>    <script type="text/javascript">
                           alert("Welcome Admin");
                          window.location = "zindex.php";
                      </script>
                 <?php   
                }
                 
            } else {
              ?>   
               <script type="text/javascript">
                       alert("Wrong username or password!");
                      window.location = "signin.php";
                  </script>
        <?php
            }
         } else {
         die("Unknown Database, Please Check");
        }
}
?>
