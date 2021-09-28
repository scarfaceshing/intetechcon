<?php 
require('session.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Farmer Data Print View</title>
</head>



<br>
<form action="ztblfarmer.php" method="post">
 
  <div style="width: 90%;margin-left: 5%">
    <h1 style="color: black; text-align: center;">FARMERS</h1>
  <table>
  <tr>
    <thead>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Sex</th>
        <th>Age</th>
        <th>Sitio/Sreet</th>
        <th>Barangay</th>
    </thead>
  
<?php
require('dbcon/dbconnection.php');
  $sql = "SELECT * FROM tblfarmer";
$result = $con-> query($sql);
if ($result-> num_rows > 0) {
  while($row = $result-> fetch_assoc()){
    $id  = $row["id"];
    $fname  = $row["fname"];
    $lname  = $row["lname"];
    $contact  = $row["contact"];
    $email  = $row["email"];
    $sex  = $row["sex"];
    $age  = $row["age"];
    $sto_street  = $row["sto_street"];
    $brgy  = $row["brgy"];
 ?>
  <tr>
    <td style='text-transform: uppercase;'><?php echo $fname.' '.$lname; ?></td>
    <td><?php echo $contact; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $sex; ?></td>
    <td><?php echo $age; ?></td>
    <td><?php echo $sto_street; ?></td>
    <td><?php echo $brgy; ?></td>
  </tr>
<?php
    
  }
}
?>
  </tr>
 
 
  
</table>
</div>
</form>
